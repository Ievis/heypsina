@extends('layouts.admin')

@section('failed')
    <div class="mx-auto max-w-2xl w-4/5 mt-8 mb-12">
        @if(session()->has('message'))
            <div
                class="border mb-4 border-2 bg-blue-500 border-blue-900 text-white font-semibold p-4 mx-auto w-full rounded-lg"
                role="alert">
                {{ session('message') }}
            </div>
            {{ session()->forget('message') }}
        @endif

        @forelse($failed_orders as $failed_order)
            <a href="/admin/order/{{ $failed_order->id }}"
               class="text-white w-full flex h-24 min-h-full mt-8 relative">
                <div
                    class="w-full rounded-lg p-2 border-2 hover:bg-blue-500 rounded-lg border-green-900 flex justify-center bg-green-700">
                    <div class="my-auto font-semibold text-xl">
                        <div class="mt-4 md:mt-0">
                            Заказ {{ $failed_order->id }}
                        </div>
                        <div class="text-white absolute right-2 top-2">
                            <button
                                class="bg-gray-900 border-2 border-blue-500 text-base text-white font-semibold px-2 rounded-lg">
                                {{ $failed_order->time_ago }}
                            </button>
                        </div>
                    </div>
                </div>
            </a>
        @empty
            <h2 class="text-center mt-8 font-semibold text-blue-500">Пусто</h2>
        @endforelse
        <div class="mt-8">
            {{ $failed_orders->links() }}
        </div>
    </div>
@endsection
