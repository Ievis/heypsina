<div>
    <div class="container my-12 mx-auto px-4 md:px-12">
        <div class="flex justify-start flex-wrap -mx-1 lg:-mx-4">
            @forelse($cart as $product)
                <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                    <div class="rounded-lg mb-4 mx-auto sm:mx-0">
                        <div
                            class="max-w-sm sm:max-w-xl md:max-w-2xl lg:max-w-3xl my-2 sm:my-0 mx-auto rounded-lg">
                            <div class="relative">
                                <img class="rounded-t-lg mb-2" src="{{ $product['photo'] }}" alt=""/>
                                <div class="text-green-200 absolute left-2 top-1">
                                    <button
                                        class="bg-gray-900 border-2 border-green-200 text-green-200 font-bold px-2 rounded-lg">
                                        MATRIX TEE
                                    </button>
                                    <button
                                        class="bg-gray-900 border-2 border-green-200 text-green-200 font-bold px-2 rounded-lg">
                                        {{ $product['size'] }}
                                    </button>
                                    <button
                                        class="bg-gray-900 border-2 border-green-200 text-green-200 font-bold px-2 rounded-lg">
                                        {{ $product['count'] }}
                                    </button>
                                </div>
                                <div class="text-green-200 absolute left-2 bottom-1">
                                    <div class="text-bold logo-color">
                                        @livewire('cart', ['product' => $product],
                                        key($product['id']))
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div
                    class="md:w-1/2 lg:w-1/3 mx-auto text-center font-bold logo-color">
                    В Вашей корзине пока нет продуктов.
                </div>
            @endforelse
        </div>
    </div>

    <div class="flex justify-end container my-12 mx-auto px-4 md:px-12">
        <div class="w-full md:w-1/3">
            <div
                class="flex justify-end">
                <div class="w-full">
                    <div class="flex justify-end">
                        <div class="flex font-bold logo-color mb-4">
                            Итого: {{ $price }} RUB
                        </div>
                    </div>
                    <div class="flex w-full justify-end">
                        @livewire('cart-clear')
                    </div>
                    <div class="flex justify-end">
                        <div class="w-full">
                            @if($isPaymentVisible)
                                <a href="/checkout"
                                   class="transition logo-color ease-in-out delay-150 hover:scale-105 hover:bg-green-900 duration-300 bg-black w-full justify-center border-2 border-green-200 hover:border-green-900 hover:bg-green-900 hover:text-green-200 transition font-medium rounded-lg px-5 py-2.5 text-center inline-flex items-center mr-2 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-check"
                                         width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                                        <rect x="9" y="3" width="6" height="4" rx="2"></rect>
                                        <path d="M9 14l2 2l4 -4"></path>
                                    </svg>
                                    <div class="text-center ml-0.5">
                                        Оформить заказ
                                    </div>
                                </a>
                            @else
                                <div
                                    class="logo-color bg-black w-full justify-center border-2 border-green-200 font-medium rounded-lg px-5 py-2.5 text-center inline-flex items-center mr-2 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-check"
                                         width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                                        <rect x="9" y="3" width="6" height="4" rx="2"></rect>
                                        <path d="M9 14l2 2l4 -4"></path>
                                    </svg>
                                    <div class="text-center ml-0.5">
                                        Оформить заказ
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
