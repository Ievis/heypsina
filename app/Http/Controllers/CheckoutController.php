<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class CheckoutController extends Controller
    {

        public function __invoke()
        {
            if (empty(session()->all()['price'])) return redirect('/cart');

            return view('checkout');
        }
    }
