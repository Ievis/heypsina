@extends('app')

@section('success')
    <style>
        html,
        body {
            height: 100%;
        }

        @media (min-width: 640px) {
            table {
                display: inline-table !important;
            }

            thead tr:not(:first-child) {
                display: none;
            }
        }

        td:not(:last-child) {
            border-bottom: 0;
        }

        th:not(:last-child) {
        }
    </style>
    <div class="container max-w-sm sm:max-w-xl mx-auto">
        <div
            class="border mb-4 border-4 bg-green-900 border-green-900 logo-color p-4 mx-auto w-full rounded-lg"
            role="alert">
            Благодарим за Ваш заказ. Пожалуйста, проверьте почту, там вся необходимая информация
        </div>
        @if($customer->city == 'Владивосток')
            <div
                class="border mb-4 border-4 bg-green-900 border-green-900 logo-color p-4 mx-auto w-full rounded-lg"
                role="alert">
                Ваш город - Владивосток. Для Владивостока доступен самовывоз по адресу ул. Толстого 23. Мы скоро
                позвоним Вам ({{ $customer->phone_number }}) для уточнения информации
            </div>
        @endif
        <div class="container flex items-center justify-center">
            <table
                class="w-full flex flex-row flex-no-wrap bg-green-900 bg-black border border-b-0 border-green-200 sm:border-0 rounded-lg w-fit my-5">
                <thead class="text-green-200">
                @foreach($products as $product)
                    <tr class="bg-teal-400 flex flex-col rounded-lg flex-no wrap sm:table-row sm:rounded-none sm:mb-0">
                        <th class="p-3 text-left rounded-tl-lg sm:rounded-none bg-green-900 sm:bg-black h-20 sm:h-fit">
                            Товар:
                        </th>
                        <th class="p-3 text-left bg-green-900 sm:bg-black h-20 sm:h-fit">Название:</th>
                        <th class="p-3 text-left bg-green-900 sm:bg-black h-20 sm:h-fit">Цвет:</th>
                        <th class="p-3 text-left bg-green-900 sm:bg-black h-20 sm:h-fit">Размер:</th>
                        <th class="p-3 text-left bg-green-900 sm:bg-black h-20 sm:h-fit">Цена:</th>
                        <th class="p-3 text-left rounded-bl-lg sm:rounded-none border-b border-green-200 sm:border-0 bg-green-900 sm:bg-black h-20 sm:h-fit">
                            Количество:
                        </th>
                    </tr>
                @endforeach
                </thead>
                <tbody class="flex-1 sm:flex-none">
                @foreach($products as $product)
                    <tr class="flex flex-col flex-nowrap bg-black rounded-lg border-b-0 sm:border-b sm:border-green-200 sm:table-row">
                        <td class="h-20 sm:h-fit p-3">
                            <div class="w-full">
                                <img class="w-12 mx-auto rounded-full" src="{{ asset($product->image) }}" alt="">
                            </div>
                        </td>
                        <td class="h-20 sm:h-fit p-3 text-green-200">
                            HEYPS!NA MATRIX TEE
                        </td>
                        <td class="h-20 sm:h-fit p-3 text-green-200">
                            {{ $product->color }}
                        </td>
                        <td class="h-20 sm:h-fit p-3 text-green-200">
                            {{ $product->size }}
                        </td>
                        <td class="h-20 sm:h-fit p-3 text-green-200">
                            2190 RUB
                        </td>
                        <td class="border-b border-green-200 rounded-br-lg sm:rounded-none sm:border-0 h-20 sm:h-fit p-3 text-green-200">
                            {{ $product->count }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="container mx-auto flex flex-col items-center">
            <div class="py-4 px-6 text-green-200 big font-bold mt-4 ">
                Информация об оплате:
            </div>

            <table
                class="w-fit flex flex-row flex-no-wrap bg-green-900 bg-black border border-b-0 border-green-200 sm:border-0 rounded-lg my-5">
                <thead class="text-green-200">
                <tr class="bg-teal-400 flex flex-col rounded-lg flex-no wrap sm:table-row sm:rounded-none sm:mb-0">
                    <th class="p-3 text-left rounded-tl-lg sm:rounded-none bg-green-900 sm:bg-black h-20 sm:h-fit">
                        Номер заказа
                    </th>
                    <th class="p-3 text-left bg-green-900 sm:bg-black h-20 sm:h-fit">
                        Статус
                        @if($customer->city == 'Владивосток')
                            самовывоза
                        @else
                            доставки
                        @endif
                    </th>
                    <th class="p-3 text-left bg-green-900 sm:bg-black h-20 sm:h-fit">
                        Стоимость товаров
                    </th>
                    <th class="p-3 text-left bg-green-900 sm:bg-black h-20 sm:h-fit">
                        Стоимость
                        @if($customer->city == 'Владивосток')
                            самовывоза
                        @else
                            доставки
                        @endif
                    </th>
                    <th class="p-3 text-left bg-green-900 sm:bg-black h-20 sm:h-fit">
                        Итого
                    </th>
                    <th class="p-3 text-left rounded-bl-lg sm:rounded-none border-b border-green-200 sm:border-0 bg-green-900 sm:bg-black h-20 sm:h-fit">
                        Статус оплаты
                    </th>
                </tr>
                </thead>
                <tbody class="flex-1 sm:flex-none">
                <tr class="flex flex-col flex-nowrap bg-black rounded-lg border-b-0 sm:border-b sm:border-green-200 sm:table-row">
                    <td class="h-20 sm:h-fit p-3 text-green-200">
                        {{ $order->id }}
                    </td>
                    <td class="h-20 sm:h-fit p-3 text-green-200">
                        @if($customer->city == 'Владивосток')
                            ОЖИДАЕТ САМОВЫВОЗА
                        @else
                            В ПРОЦЕССЕ ОТПРАВКИ
                        @endif
                    </td>
                    <td class="h-20 sm:h-fit p-3 text-green-200">
                        @if($customer->city == 'Владивосток')
                            {{ $order->amount }} RUB
                        @else
                            {{ $order->amount - 299 }} RUB
                        @endif
                    </td>
                    <td class="h-20 sm:h-fit p-3 text-green-200">
                        @if($customer->city == 'Владивосток')
                            0 RUB
                        @else
                            299 RUB
                        @endif
                    </td>
                    <td class="h-20 sm:h-fit p-3 text-green-200">
                        {{ $order->amount }} RUB
                    </td>
                    <td class="border-b border-green-200 rounded-br-lg sm:rounded-none sm:border-0 h-20 sm:h-fit p-3 text-green-200">
                        ОПЛАЧЕНО
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


@endsection
