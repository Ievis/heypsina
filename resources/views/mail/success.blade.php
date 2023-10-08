<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Подтверждение заказа HEYPS!NA</title>
    <style>
        * {
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-weight: 400;
            font-size: 20px;
        }

        th {
            width: 120px;
            overflow: hidden;
            font-weight: 700;
            font-size: medium;
            border-right: 1px solid #5be2b7;
        }

        td {
            width: 120px;
            overflow: hidden;
            font-size: medium;
            text-align: center;
            border-top: 1px solid #5be2b7;
            border-right: 1px solid #5be2b7;
        }

        table {
            border-collapse: collapse;

        }

        th:last-child {
            border-right: none;
        }

        td:last-child {
            border-right: none;
        }

        .image {
            border-radius: 50%;
            padding: 5px;
        }

        h3 {
            font-weight: bold;
        }

        .text {
            padding: 8px;
        }

        .table {
            width: 720px;
        }

        h3 {
            font-size: small;
        }
    </style>
</head>
<body>
<h3>Информация о заказе:</h3>
<table class="table">
    <tr>
        <th class="text">Товар</th>
        <th class="text">Название</th>
        <th class="text">Цвет</th>
        <th class="text">Размер</th>
        <th class="text">Цена</th>
        <th class="text">Количество</th>
    </tr>
    @foreach($products as $product)
        <tr>
            <td class="text"><img class="image" width="70" src="{{ asset($product->image) }}" alt=""></td>
            <td class="text">HEYPS!NA MATRIX TEE</td>
            <td class="text">{{ $product->color }}</td>
            <td class="text">{{ $product->size }}</td>
            <td class="text">2190 RUB</td>
            <td class="text">{{ $product->count }}</td>
        </tr>
    @endforeach
</table>
@if($is_paid)
    <br>
    <h3>Информация об оплате:</h3>
    <table class="table">
        <tr>
            <th class="text">Номер заказа</th>
            <th class="text">Стоимость товаров</th>
            <th class="text">Стоимость
                @if($customer->city == 'Владивосток')
                    Самовывоза
                @else
                    Доставки
                @endif
            </th>
            <th class="text">Итого</th>
            <th class="text">Статус оплаты</th>
        </tr>
        <tr>
            <td class="text">{{ $order->id }}</td>
            <td class="text">
                @if($customer->city == 'Владивосток')
                    {{ $order->amount }} RUB
                @else
                    {{ $order->amount - 299 }} RUB
                @endif
            </td>
            <td class="text">
                @if($customer->city == 'Владивосток')
                    0 RUB
                @else
                    299 RUB
                @endif
            </td>
            <td class="text">{{ $order->amount }} RUB</td>
            <td class="text">ОПЛАЧЕНО</td>
        </tr>
    </table>
    <br>
    <h3>Информация о
        @if($customer->city == 'Владивосток')
            самовывозе:
        @else
            доставке:
        @endif
    </h3>
    <table class="table">
        <tr>
            <th class="text">Город</th>
            <th class="text">Адрес</th>
            <th class="text">Номер дома</th>
            @if($customer->city != 'Владивосток')
                <th class="text">
                    Индекс
                </th>
            @endif
        </tr>
        @if($customer->city == 'Владивосток')
            <tr>
                <td class="text">Владивосток</td>
                <td class="text">ул. Толстого</td>
                <td class="text">23</td>
            </tr>
        @else
            <tr>
                <td class="text">{{ $customer->city }}</td>
                <td class="text">{{ $customer->address }}</td>
                <td class="text">{{ $customer->house_number }}</td>
                <td class="text">{{ $customer->index }}</td>
            </tr>
        @endif
    </table>
@endif
<br>

<div>
    @if(!$is_paid)
        <h3>{{ $customer->name }}, Ваш заказ создан, ожидает оплаты</h3>
    @else
        <h3>{{ $customer->name }}, благодарим за Ваш заказ!</h3>
    @endif
    <h3>Номер заказа: {{ $order->id }}</h3>
    <h3>В случае возникновения вопросов по заказу:</h3>
    <h3>vlad.beliy.seo@gmail.com - почта</h3>
    <h3>+79020554810 - whatsapp/telegram</h3>
</div>
</body>
</html>
