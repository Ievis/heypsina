<?php

    namespace App\Http\Controllers;

    use App\Models\Order;

    class SuccessController extends Controller
    {

        public function __invoke()
        {
            $session_id = session('session_id', false);
            session()->flush();
            if (empty($session_id)) return redirect('/');

            $order = Order::where('session_id', $session_id)->first();
            if ($order->status != 'succeeded') return redirect('/checkout')->withErrors('Пожалуйста, проверьте Вашу почту. Если там ничего связанного с заказом нет, оплата не прошла');
            $customer = $order->customer()->first();
            $products = $order->products()->get();

            return view('success', [
                'order' => $order,
                'products' => $products,
                'customer' => $customer
            ]);
        }
    }
