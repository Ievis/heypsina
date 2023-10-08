<div>
    <form wire:submit.prevent="addToCart()" method="POST"
          class="border-green-200 p-4 rounded-lg">
        @csrf
        <div class="relative z-0 mb-6 w-full group">
            <label for="color" class="font-bold text-sm logo-color">Цвет:</label>
            <select wire:model="color" id="color" @if($is_added) {{ "disabled" }} @endif
            class="block py-2.5 px-0 w-full text-sm font-bold logo-color bg-transparent border-0 @if($is_added) {{ "border-b-green-900" }} @endif border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-green-900 peer">
                <option class="font-semibold bg-black logo-color" selected>Зелёный</option>
                <option class="font-semibold bg-black text-pink-400">Розовый</option>
                <option class="font-semibold bg-black text-white">Белый</option>
            </select>
        </div>
        <div class="relative z-0 mb-6 w-full group">
            <label for="size" class="font-bold text-sm logo-color">Размер:</label>
            <select wire:model="size" id="size" @if($is_added) {{ "disabled" }} @endif
            class="block py-2.5 px-0 w-full text-sm font-bold logo-color bg-transparent @if($is_added) {{ "border-b-green-900" }} @endif border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-green-900 peer">
                <option class="font-semibold bg-black logo-color" selected>S</option>
                <option class="font-semibold bg-black logo-color">M</option>
                <option class="font-semibold bg-black logo-color">L</option>
                <option class="font-semibold bg-black logo-color">XL</option>
                <option class="font-semibold bg-black logo-color">XXL</option>
                <option class="font-semibold bg-black logo-color">XXXL</option>
            </select>
        </div>
        <div class="relative z-0 mb-6 w-full group">
            <label for="count" class="font-bold text-sm logo-color">Количество:</label>
            <input wire:model="count" id="count" @if($is_added) {{ "disabled" }} @endif
            class="block py-2.5 px-0 w-full text-sm font-bold logo-color bg-transparent @if($is_added) {{ "border-b-green-900" }} @endif border-0 border-b-2 border-green-200 appearance-none focus:outline-none focus:ring-0 focus:border-green-900 peer">
        </div>
        <button wire:click="initiateAddition()"
                @if($is_added) {{ "disabled" }} @endif @if($isPhotoChanged) {{ "disabled" }} @endif @if($is_button_blocked) {{ "disabled" }} @endif
                type="submit"
                class="transition ease-in-out delay-150 hover:scale-105 hover:bg-green-900 duration-300 bg-black w-full justify-center border-2 border-green-200 hover:border-green-900 hover:bg-green-900 hover:text-green-200 transition font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 mb-2">
            @if($is_added)
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="animate-pulse text-green-200 icon icon-tabler icon-tabler-check"
                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l5 5l10 -10"></path>
                </svg>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" class="logo-color icon icon-tabler icon-tabler-shopping-cart"
                     width="24"
                     height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="6" cy="19" r="2"></circle>
                    <circle cx="17" cy="19" r="2"></circle>
                    <path d="M17 17h-11v-14h-2"></path>
                    <path d="M6 5l14 1l-1 7h-13"></path>
                </svg>
            @endif
            <span class="font-semibold logo-color">
                Добавить в корзину
            </span>
        </button>
        <div class=" max-w-md sm:max-w-xl md:max-w-3xl">
            <button wire:click="tableShow()" type="button"
                    class="transition ease-in-out delay-150 hover:scale-105 hover:bg-green-900 duration-300 w-full p-4 justify-center bg-black border-2 border-green-200 hover:border-green-900 hover:bg-green-900 hover:text-green-900 transition font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="text-green-200 icon icon-tabler icon-tabler-table-shortcut" width="24" height="24"
                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                     stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 12v-6a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-6"></path>
                    <path d="M4 10h16"></path>
                    <path d="M10 4v8"></path>
                    <path d="M3 21l6 -6"></path>
                    <path d="M4 15h5v5"></path>
                </svg>
                <div class="font-semibold logo-color ml-1">
                    Таблица размеров
                </div>
            </button>
        </div>
    </form>
</div>
