@extends('layouts.admin')

@section('order')
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
        <div class="container mx-auto flex flex-col items-center">
            <div class="py-4 px-6 big font-bold text-blue-500 mt-4">
                Информация о заказе:
            </div>

            <div class="container flex items-center justify-center">
                <table
                    class="w-full flex flex-row flex-no-wrap bg-green-700 bg-green-700 border border-b-0 border-green-200 sm:border-0 rounded-lg w-fit my-5">
                    <thead class="text-white">
                    @foreach($products as $product)
                        <tr class="bg-teal-400 flex flex-col rounded-lg flex-no wrap sm:table-row sm:rounded-none sm:mb-0">
                            <th class="p-3 text-left rounded-tl-lg sm:rounded-none bg-green-700 sm:bg-green-700 h-20 sm:h-fit">
                                Товар:
                            </th>
                            <th class="p-3 text-left bg-green-700 sm:bg-green-700 h-20 sm:h-fit">Название:</th>
                            <th class="p-3 text-left bg-green-700 sm:bg-green-700 h-20 sm:h-fit">Цвет:</th>
                            <th class="p-3 text-left bg-green-700 sm:bg-green-700 h-20 sm:h-fit">Размер:</th>
                            <th class="p-3 text-left rounded-bl-lg sm:rounded-none border-b border-green-200 sm:border-0 bg-green-700 sm:bg-green-700 h-20 sm:h-fit">
                                Количество:
                            </th>
                        </tr>
                    @endforeach
                    </thead>
                    <tbody class="flex-1 sm:flex-none">
                    @foreach($products as $product)
                        <tr class="flex flex-col flex-nowrap bg-blue-500 rounded-lg border-b-0 sm:border-b sm:border-green-200 sm:table-row">
                            <td class="h-20 sm:h-fit p-3">
                                <div class="w-full">
                                    <img class="w-12 mx-auto rounded-full" src="{{ asset($product->image) }}" alt="">
                                </div>
                            </td>
                            <td class="h-20 sm:h-fit p-3 text-white">
                                HEYPS!NA MATRIX TEE
                            </td>
                            <td class="h-20 sm:h-fit p-3 text-white">
                                {{ $product->color }}
                            </td>
                            <td class="h-20 sm:h-fit p-3 text-white">
                                {{ $product->size }}
                            </td>
                            <td class="border-b border-green-200 rounded-br-lg sm:rounded-none sm:border-0 h-20 sm:h-fit p-3 text-white">
                                {{ $product->count }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="p-2 w-10/12 sm:w-full space-y-2">
                <h1 class="font-semibold">
                    Фамилия: <span class="text-blue-500 font-semibold"> {{ $customer->surname }} </span>
                </h1>
                <h1 class="font-semibold">
                    Имя: <span class="text-blue-500 font-semibold"> {{ $customer->name }} </span>
                </h1>
                <h1 class="font-semibold">
                    Отчество: <span class="text-blue-500 font-semibold"> {{ $customer->patronymic }} </span>
                </h1>
                <h1 class="font-semibold">
                    Город: <span class="text-blue-500 font-semibold"> {{ $customer->city }} </span>
                </h1>

                @if($customer->city != 'Владивосток')
                    <h1 class="font-semibold">
                        Адрес: <span class="text-blue-500 font-semibold"> {{ $customer->address }} </span>
                    </h1>
                    <h1 class="font-semibold">
                        Дом: <span class="text-blue-500 font-semibold"> {{ $customer->house_number }} </span>
                    </h1>
                    <h1 class="font-semibold">
                        Индекс: <span class="text-blue-500 font-bold"> {{ $customer->index }} </span>
                    </h1>
                @endif

                <h1 class="font-semibold">
                    Телефон: <span class="text-blue-500 font-bold"> {{ $customer->phone_number }} </span>
                </h1>
                <h1 class="font-semibold">
                    email: <span class="text-blue-500 font-bold"> {{ $customer->email }} </span>
                </h1>
                @if($order->comment)
                    <h1 class="font-semibold">
                        Комментарий: <span class="text-blue-500 font-semibold"> {{ $order->comment }} </span>
                    </h1>
                @endif
            </div>

            @if($order->delivery == 'Shipped')
                @if(empty($is_failed))
                    @if($customer->city == 'Владивосток')
                        <h1 class="font-semibold mt-8">
                        <span class="text-blue-500 font-bold uppercase">
                            Заказ вручён!
                        </span>
                        </h1>
                    @else
                        <h1 class="font-semibold mt-8">
                        <span class="text-blue-500 font-bold uppercase">
                            Заказ отправлен!
                        </span>
                            <p class="text-center text-blue-500">
                                Трек: <span
                                    class="text-blue-500 font-bold"> {{ $order->shipped_order()->first()->track_number }} </span>
                            </p>
                        </h1>
                    @endif
                @else
                    <span class="text-blue-500 font-bold uppercase mt-8">
                        К сожалению, покупатель не получил письмо с трек-номером, однако его номер телефона известен,
                        и можно самостоятельно сообщить ему трек-номер
                    </span>
                    <p class="text-center text-blue-500 mt-8">
                        Трек: <span
                            class="text-blue-500 font-bold"> {{ $order->shipped_order()->first()->track_number }} </span>
                    </p>
                @endif
            @else
                <form class="p-2 w-10/12 sm:w-full mt-4" action="/admin/order/store/{{ $order->id }}" method="POST">
                    @csrf
                    @if($errors->any())
                        <div
                            class="border mb-4 border-2 bg-red-900 border-blue-500 text-white font-semibold p-4 mx-auto w-full rounded-lg"
                            role="alert">
                            @if($customer->city == 'Владивосток')
                                Ошибка при заполнении
                                полей
                            @else{{$errors->first()}}@endif
                        </div>
                    @endif
                    @if(session()->has('message'))
                        <div
                            class="border mb-4 border-2 bg-red-900 border-blue-500 text-white font-semibold p-4 mx-auto w-full rounded-lg"
                            role="alert">
                            {{ session('message') }}
                        </div>
                        {{ session()->forget('message') }}
                    @endif
                    <div class="mb-6">
                        <label for="track" class="block mb-2 text-sm font-medium text-gray-900">
                            @if($customer->city == 'Владивосток')
                                Введите что угодно
                            @else
                                Трек-номер
                            @endif
                        </label>
                        <input type="text" id="track" name="track"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                               placeholder=@if($customer->city == 'Владивосток')"Введите что-нибудь"@else"Введите трек-номер"@endif
                               value="{{ old('track') }}">
                    </div>
                    <div class="mb-6">
                        <label for="track_confirmation"
                               class="block mb-2 text-sm font-medium text-gray-900">
                            @if($customer->city == 'Владивосток')
                                Повторите текст выше
                            @else
                                Трек-номер
                            @endif
                        </label>
                        <input type="text" id="track_confirmation" name="track_confirmation"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                               placeholder=@if($customer->city == 'Владивосток')"Введите что-нибудь"@else"Введите трек-номер"@endif>
                    </div>
                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium mb-12 rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                        Завершить
                    </button>
                </form>
            @endif
        </div>
    </div>


@endsection
