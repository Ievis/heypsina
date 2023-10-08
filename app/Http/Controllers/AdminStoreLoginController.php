<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\AdminRequest;
    use Illuminate\Support\Facades\Auth;

    class AdminStoreLoginController extends Controller
    {
        public function __invoke(AdminRequest $request)
        {
            $isAuthenticated = Auth::attempt([
                'login' => $request->login,
                'password' => $request->password
            ]);

            if ($isAuthenticated) return redirect('/admin/orders/waiting');

            return redirect()->back()->withInput();
        }
    }
