<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Магазин одежды heypsina">
    <meta name="keywords" content="heypsina, hey psina, matrix tee">
    <meta name="author" content="Владислав Белый">
    <title>HEYPS!NA</title>
    <link href="{{ mix('css/app.css') }}?version=51" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    <style>
        .page1 {
            background-color: black;
        }

        .logo-color {
            color: #5be2b7;
        }
    </style>
    @livewireStyles
</head>
<body class="bg-gray-100 page1">

<div class="page flex flex-col min-h-screen">
    <header class="header">
        <nav class="bg-black border-gray-200 px-4 lg:px-6 py-2.5">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl h-12">
                <a href="/" class="flex items-center mx-2">
                    <img src="{{ asset('media/logo.webp') }}" class="mr-3 h-6 sm:h-9 rounded-full object-contain"
                         alt="Flowbite Logo"/>
                </a>
                <div class="flex items-center lg:order-2">
                    @livewire('cart-counter')
                </div>
            </div>
        </nav>
    </header>

    @yield('main')
    @yield('about')
    @yield('cart')
    @yield('checkout')
    @yield('success')
    @yield('offer')
    @yield('shipment')
    @yield('confidentiality')
    @yield('admin')
    @yield('order')
    @yield('contacts')

    <footer class="p-4 my-auto mb-0 bg-black sm:p-6">
        <div class="flex flex-col justify-center max-w-xl mx-auto opacity-50">
            <div class="flex justify-center">
                <div
                    class="flex flex-1 w-full flex-col lg:flex-row space-x-0 lg:space-x-10 space-y-5 lg:space-y-0 items-start lg:items-center">
                    <div class="text-green-200 font-semibold text-sm">
                        <a href="/shipment"
                           class="hover:underline uppercase">
                            Оплата/доставка
                        </a>
                    </div>
                    <div class="text-green-200 font-semibold text-sm">
                        <a href="/contacts"
                           class="hover:underline uppercase">
                            Контакты
                        </a>
                    </div>
                </div>
                <div
                    class="flex flex-1 flex-col lg:flex-row space-x-0 lg:space-x-10 space-y-5 lg:space-y-0 lg:items-center justify-end">
                    <div class="text-green-200 font-semibold text-sm text-end">
                        <a href="/offer" class="hover:underline uppercase">
                            Оферта
                        </a>
                    </div>
                    <div class="text-green-200 font-semibold text-sm text-end">
                        <a href="/confidentiality"
                           class="hover:underline uppercase ">
                            Конфиденциальность
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex justify-between mt-4 items-center">
                <div class="text-green-200 font-semibold text-sm">
                    HEYPS!NA © 2022
                </div>
                <div class="flex">
                    <a href="https://vk.com/heypsina.shop">
                        <img src="{{ asset('media/vk-icon.svg') }}" alt="" width="50"></a>
                    <a href="https://instagram.com/heypsina.shop">
                        <img src="{{ asset('media/ig-icon.svg') }}" alt="" width="50"></a>
                    <a href="https://t.me/heypsinashop">
                        <img src="{{ asset('media/tg-icon.svg') }}" alt="" width="50"></a>
                </div>
            </div>
        </div>
    </footer>
</div>

@livewireScripts
</body>
</html>
