<?php

    namespace App\Http\Controllers;


    use App\Mail\RegisterMail;
    use App\Models\Order;
    use Illuminate\Support\Facades\Mail;

    class ProductController extends Controller
    {

        public function __invoke()
        {
            return view('main');
        }
    }
