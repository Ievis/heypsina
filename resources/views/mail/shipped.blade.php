<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ваш заказ оплачен</title>
    <style>
        * {
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-weight: 400;
            font-size: 20px;
        }

        .message {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
@if($customer->city == 'Владивосток')
    <div> Благодарим Вас за приобретение мерча HEYPS!NA</div>
    <div> Удачного дня и хорошего настроения!</div>
@else
    <div class="message">
        Ваш заказ (номер: {{ $order->id }}) отправлен по почте России. Трек-код для отслеживания по почте
        России: {{ $track }}
    </div>
    <div>
        Отследить посылку можно на официальном сайте Почты России: https://www.pochta.ru/tracking
    </div>
@endif
</body>
</html>
