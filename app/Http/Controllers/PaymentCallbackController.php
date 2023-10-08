<?php

    namespace App\Http\Controllers;

    use App\Mail\ErrorLogMail;
    use App\Mail\RegisterMail;
    use App\Models\Order;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Log;
    use Illuminate\Support\Facades\Mail;
    use YooKassa\Client;
    use YooKassa\Model\Notification\NotificationSucceeded;
    use YooKassa\Model\Notification\NotificationWaitingForCapture;
    use YooKassa\Model\NotificationEventType;
    use YooKassa\Model\PaymentStatus;

    class PaymentCallbackController extends Controller
    {

        public function __invoke(Request $request)
        {
            $source = $request->getContent();
            $requestBody = json_decode($source, true);

            try {
                $notification = ($requestBody['event'] === NotificationEventType::PAYMENT_SUCCEEDED)
                    ? new NotificationSucceeded($requestBody)
                    : new NotificationWaitingForCapture($requestBody);
            } catch (\Exception $e) {
                Mail::to('larzyakov@mail.ru')->send(new ErrorLogMail($source));
                Log::error($source);
            }

            $payment = $notification->getObject();

            $order = Order::where('order_id', $payment->id)->first();
            $customer = $order->customer()->first();
            $products = $order->products()->get();

            if ($payment->getStatus() === PaymentStatus::SUCCEEDED) {
                $order->status = 'succeeded';
                $order->delivery = 'Waiting for shipment';
                $order->save();

                if (empty($order->is_emailed)) {
                    Mail::to($customer->email)->send(new RegisterMail($order, $products, $customer));
                    $order->is_emailed = true;
                }
            }

            $order->save();
        }
    }
