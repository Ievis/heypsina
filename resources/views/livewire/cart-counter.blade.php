<div>
    <a href="/cart"
       class="bg-primary-700 font-bold flex active logo-color font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 focus:outline-none">
        @if($is_added)
            <button type="button" disabled>
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="animate-spin h-5 w-5 mr-3 icon icon-tabler icon-tabler-refresh"
                     width="12" height="12"
                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                     stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                    <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                </svg>
            </button>
        @else
            <div class="flex justify-end flex-row">
                <svg xmlns="http://www.w3.org/2000/svg" class="logo-color mr-2 icon icon-tabler icon-tabler-shopping-cart"
                     width="24"
                     height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="6" cy="19" r="2"></circle>
                    <circle cx="17" cy="19" r="2"></circle>
                    <path d="M17 17h-11v-14h-2"></path>
                    <path d="M6 5l14 1l-1 7h-13"></path>
                </svg>
                {{ $count }}
            </div>
        @endif
    </a>
</div>
