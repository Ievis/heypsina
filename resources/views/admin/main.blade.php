@extends('layouts.admin')

@section('admin')
    <div class="mx-auto max-w-2xl w-4/5 mt-8 mb-12">
        @if($errors->any())
            <div
                class="border mb-4 border-2 bg-blue-500 border-blue-900 text-white font-semibold p-4 mx-auto w-full rounded-lg"
                role="alert">
                {{ $errors->first() }}
            </div>
        @endif
        @if(session()->has('message'))
            <div
                class="border mb-4 border-2 bg-blue-500 border-blue-900 text-white font-semibold p-4 mx-auto w-full rounded-lg"
                role="alert">
                {{ session('message') }}
            </div>
            {{ session()->forget('message') }}
        @endif
        <div class="flex space-x-5">
            <a href="@if($is_vlad) {{ '/admin/orders/waiting/vlad' }} @else {{ '/admin/orders/waiting' }} @endif"
               class="text-white w-1/2 mt-8 relative">
                <div
                    class="rounded-lg p-2 h-24 min-h-full border-2 border-green-900 hover:bg-blue-500 flex justify-center bg-green-700">
                    <div class="my-auto font-semibold text-xl">
                        <div class="mt-4 md:mt-0">
                            Отправить
                        </div>
                        <div class="text-white absolute right-2 top-2">
                            <button
                                class="bg-gray-900 border-2 border-blue-500 text-base text-white font-semibold px-2 rounded-lg">
                                {{ $waitingPrice }}
                            </button>
                            <button
                                class="bg-gray-900 border-2 border-blue-500 text-base text-white font-semibold px-2 rounded-lg">
                                {{ $waitingCount }}
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            <a href="@if($is_vlad) {{ '/admin/orders/shipped/vlad' }} @else {{ '/admin/orders/shipped' }} @endif"
               class="text-white w-1/2 mt-8 relative">
                <div
                    class="rounded-lg p-2 h-24 min-h-full border-2 border-green-900 hover:bg-blue-500 flex justify-center bg-green-700">
                    <div class="my-auto font-semibold text-xl">
                        <div class="mt-4 md:mt-0">
                            Отправлено
                        </div>
                        <div class="text-white absolute right-2 top-2">
                            <button
                                class="bg-gray-900 border-2 border-blue-500 text-base text-white font-semibold px-2 rounded-lg">
                                {{ $shippedPrice }}
                            </button>
                            <button
                                class="bg-gray-900 border-2 border-blue-500 text-base text-white font-semibold px-2 rounded-lg">
                                {{ $shippedCount }}
                            </button>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        @forelse($orders as $order)
            <a href="/admin/order/{{ $order->id }}"
               class="text-white w-full flex h-24 min-h-full mt-8 relative">
                <div
                    class="w-full rounded-lg p-2 border-2 hover:bg-blue-500 rounded-lg border-green-900 flex justify-center bg-green-700">
                    <div class="my-auto font-semibold text-xl">
                        <div class="mt-4 md:mt-0">
                            Заказ {{ $order->id }}
                        </div>
                        <div class="text-white absolute right-2 top-2">
                            <button
                                class="bg-gray-900 border-2 border-blue-500 text-base text-white font-semibold px-2 rounded-lg">
                                {{ $order->time_ago }}
                            </button>
                            <button
                                class="bg-gray-900 border-2 border-blue-500 text-base text-white font-semibold px-2 rounded-lg">
                                {{ $order->amount }}
                            </button>
                            <button
                                class="bg-gray-900 border-2 border-blue-500 text-base text-white font-semibold px-2 rounded-lg">
                                {{ $order->products_sum_count }}
                            </button>
                        </div>
                    </div>
                </div>
            </a>
        @empty
            <h2 class="text-center mt-8 font-semibold text-blue-500">Пусто</h2>
        @endforelse
        <div class="mt-8">
            {{ $orders->links() }}
        </div>
    </div>
@endsection
