<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Подтверждение заказа HEYPS!NA</title>
    <style type="text/css">
        * {
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-weight: 400;
            font-size: 20px;
        }

        th {
            font-weight: 700;
            font-size: 18px;
            border-right: 1px solid #5be2b7;
        }

        td {
            font-size: 18px;
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
    </style>
</head>
<body>
<h3>Информация о заказе:</h3>
<table width="1200">
    <tr>
        <th>Товар</th>
        <th>Название</th>
        <th>Цвет</th>
        <th>Размер</th>
        <th>Цена</th>
        <th>Количество</th>
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
<br>
<h3>Информация об оплате:</h3>
<table width="1200">
    <tr>
        <th>Номер заказа</th>
        <th>Стоимость товаров</th>
        <th>Стоимость
            @if($customer->city == 'Владивосток')
                Самовывоза
            @else
                Доставки
            @endif
        </th>
        <th>Итого</th>
        <th>Статус оплаты</th>
    </tr>
    <tr>
        <td>{{ $product->id }}</td>
        <td>
            @if($customer->city == 'Владивосток')
                {{ $order->amount }} RUB
            @else
                {{ $order->amount - 299 }} RUB
            @endif
        </td>
        <td>
            @if($customer->city == 'Владивосток')
                0 RUB
            @else
                299 RUB
            @endif
        </td>
        <td>{{ $order->amount }} RUB</td>
        <td>ОПЛАЧЕНО</td>
    </tr>
</table>
<br>



</body>
</html>
