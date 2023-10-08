<?php

    namespace App\Http\Controllers;


    use App\Models\Customer;
    use App\Models\Order;
    use Carbon\Carbon;


    class AdminMainController extends Controller
    {
        public function __invoke($status, $city = false)
        {
            if ($status == 'failed') {
                $failed_orders = Order::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate(10);
                $this->calculateTimeAgo($failed_orders);

                return view('admin.failed', [
                    'failed_orders' => $failed_orders
                ]);
            }

            $statuses = [
                'waiting' => 'Waiting for shipment',
                'shipped' => 'Shipped'
            ];
            if (empty($statuses[$status])) return redirect('/admin/orders/waiting');
            $status = $statuses[$status];

            $waitingOrders = Order::whereIn('customer_id', function ($query) use ($city) {
                $query->select('id')
                    ->from(with(new Customer)->getTable());
                $city ? $query->where('city', '=', 'Владивосток') : $query->where('city', '!=', 'Владивосток');
            })
                ->where('delivery', '=', 'Waiting for shipment')
                ->orderBy('created_at', 'asc')
                ->withSum('products', 'count');

            $shippedOrders = Order::whereIn('customer_id', function ($query) use ($city) {
                $query->select('id')
                    ->from(with(new Customer)->getTable());
                $city ? $query->where('city', '=', 'Владивосток') : $query->where('city', '!=', 'Владивосток');
            })
                ->where('delivery', '=', 'Shipped')
                ->orderBy('updated_at', 'desc')
                ->withSum('products', 'count');

            $waitingCount = $waitingOrders->pluck('products_sum_count')->sum();
            $shippedCount = $shippedOrders->pluck('products_sum_count')->sum();

            $waitingPrice = $waitingOrders->pluck('amount')->sum();
            $shippedPrice = $shippedOrders->pluck('amount')->sum();

            if ($status == 'Shipped') {
                $orders = $shippedOrders->paginate(4);
            } else {
                $orders = $waitingOrders->paginate(4);
            }

            $this->calculateTimeAgo($orders);

            return view('admin.main', [
                'orders' => $orders,
                'status' => $status,
                'waitingCount' => $waitingCount,
                'shippedCount' => $shippedCount,
                'waitingPrice' => $waitingPrice,
                'shippedPrice' => $shippedPrice,
                'is_vlad' => $city
            ]);
        }

        private function calculateTimeAgo($orders)
        {
            $orders->map(function ($order) {
                $time_ago = $order->updated_at->diffInMinutes(Carbon::now());

                if ($time_ago > 60 * 24) {
                    $time_ago = round($time_ago / (60 * 24)) . ' дней назад';
                } elseif ($time_ago > 60) {
                    $time_ago = round($time_ago / 60) . ' часов назад';
                } else {
                    $time_ago = $time_ago . ' минут назад';
                    if ($time_ago < 1) $time_ago = 'Только что';
                }

                $order->time_ago = $time_ago;
                return $order;
            });
        }
    }
