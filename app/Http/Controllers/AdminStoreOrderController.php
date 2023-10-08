<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\OrderStoreRequest;
    use App\Mail\ShippedAnnounceEmail;
    use App\Models\FailedOrder;
    use App\Models\Order;
    use App\Models\ShippedOrder;
    use Illuminate\Support\Facades\Mail;

    class AdminStoreOrderController extends Controller
    {
        public function __invoke(OrderStoreRequest $request, $id)
        {
            $shipped_order = new ShippedOrder([
                'order_id' => $id,
                'track_number' => $request->track
            ]);

            $order = $this->checkOrder($shipped_order);
            $customer = $order->customer()->first();

            try {
                Mail::to($customer->email)->send(new ShippedAnnounceEmail($order));
            } catch (\Exception $exception) {
                if ($customer->city == 'Владивосток') {
                    return redirect()->back()->with('message', 'Отлично! Заказ выполнен!');
                }

                $failed_order = new FailedOrder([
                    'order_id' => $id,
                    'track_number' => $request->track
                ]);
                $failed_order->save();
                $order->delete();

                return redirect('/admin/orders/waiting')->withErrors('Не удалось отправить трек-код на почту заказчика. Свяжитесь с ним по номеру телефона: ' . $customer->phone_number);
            }

            return redirect()->back()->with('message', 'Отлично! Заказ выполнен!');
        }

        private function checkOrder($shipped_order)
        {
            $order = $shipped_order->order()->first();
            $order->delivery = 'Shipped';

            $shipped_order->save();
            $order->save();

            return $order;
        }
    }
