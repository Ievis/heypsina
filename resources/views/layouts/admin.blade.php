<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <title>HEYPS!NA</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
</head>
<body class="bg-gray-100">

<header class="header">
    <nav class="bg-gray-200 border-gray-200 px-4 lg:px-6 py-2.5">
        <div class="flex flex-wrap justify-center space-x-5 items-center mx-auto max-w-screen-xl h-12 mx-auto">
            <a href="/admin/orders/waiting" class="flex items-center text-blue-500 font-semibold">
                Заказы
            </a>
            <a href="/admin/orders/waiting/vlad" class="flex items-center text-blue-500 font-semibold">
                Владивосток
            </a>
            <a href="/admin/orders/failed" class="flex items-center text-blue-500 font-semibold">
                Неудачные заказы
            </a>
        </div>
    </nav>
</header>

@yield('admin')
@yield('order')
@yield('failed')

</body>
</html>
