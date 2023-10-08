<?php

    namespace App\Http\Controllers;


    class AdminShowLoginController extends Controller
    {
        public function __invoke()
        {
            return view('admin.login');
        }
    }
