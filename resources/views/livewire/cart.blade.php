<div class="flex justify-end mt-2">
    <div class="w-full mr-2 ml-2">
        <form wire:submit.prevent="decrement()" wire:loading.attr="disabled" method="POST">
            <button wire:click="turn()"
                    @if(!$is_active) {{ "disabled" }} @endif
                    type="submit"
                    class="bg-gray-900 border-2 border-green-200 text-green-200 font-bold px-2 rounded-lg">
                @if(!$is_active)
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="animate-spin text-green-400 icon icon-tabler icon-tabler-refresh"
                         width="24" height="24"
                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                        <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                    </svg>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-minus" width="24"
                         height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                @endif
            </button>
        </form>
    </div>
    <div class="text-bold w-full text-sm text-green-400 mr-2">
        <form wire:submit.prevent="increment()" wire:loading.attr="disabled" method="POST">
            @csrf
            <input wire:model="product" type="hidden">
            <button wire:click="turn()"
                    @if(!$is_active) {{ "disabled" }} @endif
                    type="submit"
                    class="bg-gray-900 border-2 border-green-200 text-green-200 font-bold px-2 rounded-lg">
                @if(!$is_active)
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="animate-spin icon text-green-400 icon-tabler icon-tabler-refresh"
                         width="24" height="24"
                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                        <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                    </svg>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24"
                         height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                @endif
            </button>
        </form>
    </div>
    <div class="w-full text-bold text-sm text-green-400 mr-2">
        <form wire:submit.prevent="productRemove()" wire:loading.attr="disabled" method="POST">
            <button wire:click="turn()"
                    @if(!$is_active) {{ "disabled" }} @endif
                    type="submit"
                    class="bg-gray-900 border-2 border-green-200 text-green-200 font-bold px-2 rounded-lg">
                @if(!$is_active)
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="animate-spin icon text-green-400 icon-tabler icon-tabler-refresh"
                         width="24" height="24"
                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                        <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                    </svg>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24"
                         height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                @endif
            </button>
        </form>
    </div>
</div>
