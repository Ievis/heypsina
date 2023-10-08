<div class="w-full">
    <button wire:click="cartClear()" type="button"
            @if($is_cart_empty) {{ 'disabled' }} @endif
            class="@if(empty($is_cart_empty)) {{ 'transition ease-in-out delay-150 hover:scale-105 hover:bg-green-900 duration-300 hover:border-green-900' }} @endif bg-black w-full justify-center border-2 border-green-200 hover:text-green-200 transition font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="logo-color icon icon-tabler icon-tabler-shopping-cart-x"
             width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
             stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <circle cx="6" cy="19" r="2"></circle>
            <circle cx="17" cy="19" r="2"></circle>
            <path d="M17 17h-11v-14h-2"></path>
            <path d="M6 5l7.999 .571m5.43 4.43l-.429 2.999h-13"></path>
            <path d="M17 3l4 4"></path>
            <path d="M21 3l-4 4"></path>
        </svg>
        <div class="font-semibold logo-color ml-1">
            Очистить корзину
        </div>
    </button>
</div>
