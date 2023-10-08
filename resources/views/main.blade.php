@extends('app')

@section('main')
    <div class="flex flex-col lg:flex-row container mx-auto justify-center mt-4 mb-8 sm:mb-16">
        <div
            class="flex flex-col mx-auto lg:mr-4 lg:mx-0 justify-start max-w-sm sm:max-w-xl md:max-w-3xl lg:max-w-xl rounded-lg">
            @livewire('photo')
            <div class="bg-black p-5">
                <div class="flex">
                    <button disabled class="text-center flex mr-4">
                        <h5 class="text-center text-2xl font-bold logo-color tracking-tight">
                            MATRIX TEE
                        </h5>
                    </button>
                    <button
                        wire:loading.class="opacity-0"
                        class="bg-gray-900 text-green-200 font-bold px-4 rounded-lg">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="icon text-green-200 icon-tabler icon-tabler-cash mr-1" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <rect x="7" y="9" width="14" height="10" rx="2"></rect>
                                <circle cx="14" cy="14" r="2"></circle>
                                <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2"></path>
                            </svg>
                            2190 RUB
                        </div>
                    </button>
                </div>
                <p class="mb-3 mt-4 font-semibold logo-color dark:text-gray-400">Большой принт размером 45x30см наносится
                    техникой
                    шелкотрафаретного переноса с использованием премиальной пластизолиевой краски, которая
                    пропечатывается в
                    ниточную структуру ткани и сушится при температуре 250°C</p>
                <p class="mb-3 font-semibold logo-color dark:text-gray-400">Футболки умеренной оверсайз посадки с
                    заниженной
                    плечевой линией. Состоят из хлопка 100% плотностью 200 гр/м². Доступна вся размерная сетка от S до
                    XXXL.</p>
                <div>
                </div>
            </div>
        </div>

        <div class="flex flex-col mx-auto lg:mx-0 max-w-sm sm:max-w-xl md:max-w-3xl lg:max-w-sm mt-2 w-full">
            <div class="p-2 max-w-md sm:max-w-xl md:max-w-3xl">
                @livewire('make-order')
            </div>
            @livewire('table')
        </div>
    </div>
@endsection
