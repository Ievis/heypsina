<?php

    namespace App\Http\Controllers;


    use App\Models\FailedOrder;
    use App\Models\Order;

    class AdminShowOrderController extends Controller
    {
        public function __invoke($id)
        {
            $order = Order::find($id) ?? FailedOrder::where('order_id', '=', $id)->first();
            if (empty($order)) return redirect('/admin/orders/waiting')->withErrors('Страница не найдена');
            $is_failed = false;

            if (class_basename($order) == 'FailedOrder') {
                $is_failed = true;
                $order = $order->order()->first();
            }

            $products = $order->products()->get();
            $customer = $order->customer()->first();

            return view('admin.order', [
                'order' => $order,
                'products' => $products,
                'customer' => $customer,
                'is_failed' => $is_failed
            ]);
        }
    }
