<div>
    <div class="max-w-sm md:max-w-xl lg:max-w-2xl mx-auto flex flex-row justify-between space-x-2">
        <form action="/payment" method="POST"
              class="border-green-200 p-4 mx-auto w-full rounded-lg">
            @if($errors->any())
                <div
                    class="border mb-4 border-4 bg-green-900 border-green-900 logo-color p-4 mx-auto w-full rounded-lg"
                    role="alert">
                    {{$errors->first()}}
                </div>
            @endif
            @if(session()->has('message'))
                <div
                    class="border mb-4 border-4 bg-green-900 border-green-900 logo-color p-4 mx-auto w-full rounded-lg"
                    role="alert">
                    {{ session('message') }}
                </div>
                {{ session()->forget('message') }}
            @endif
            @csrf
            <div class="relative z-0 mb-6 w-full group">
                <label for="name" class="font-bold text-sm logo-color">Имя:</label>
                <input name="name" id="name" value="{{ old('name') }}"
                       class="block py-2.5 px-0 w-full text-sm font-bold logo-color bg-transparent border-0 border-b-2 border-green-200 appearance-none dark:text-gray-400 focus:outline-none focus:ring-0 focus:border-green-900 peer"/>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <label for="surname" class="font-bold text-sm logo-color">Фамилия:</label>
                <input name="surname" id="surname" value="{{ old('surname') }}"
                       class="block py-2.5 px-0 w-full text-sm font-bold logo-color bg-transparent border-0 border-b-2 border-green-200 appearance-none dark:text-gray-400 focus:outline-none focus:ring-0 focus:border-green-900 peer"/>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <label for="patronymic" class="font-bold text-sm logo-color">Отчество:</label>
                <input name="patronymic" id="patronymic" value="{{ old('patronymic') }}"
                       class="block py-2.5 px-0 w-full text-sm font-bold logo-color bg-transparent border-0 border-b-2 border-green-200 appearance-none dark:text-gray-400 focus:outline-none focus:ring-0 focus:border-green-900 peer"/>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <label for="phone_number" class="font-bold text-sm logo-color">Номер телефона:</label>
                <input name="phone_number" id="phone_number" value="{{ old('phone_number') }}"
                       class="block py-2.5 px-0 w-full text-sm font-bold logo-color bg-transparent border-0 border-b-2 border-green-200 appearance-none dark:text-gray-400 focus:outline-none focus:ring-0 focus:border-green-900 peer"/>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <label for="email" class="font-bold text-sm logo-color">Email:</label>
                <input name="email" id="email" value="{{ old('email') }}"
                       class="block py-2.5 px-0 w-full text-sm font-bold logo-color bg-transparent border-0 border-b-2 border-green-200 appearance-none dark:text-gray-400 focus:outline-none focus:ring-0 focus:border-green-900 peer"/>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <label for="city_option" class="font-bold text-sm logo-color">Город:</label>
                <div class="container mt-30">
                    <select wire:model="city_option" name="city_option" id="city_option"
                            class="block py-2.5 px-0 w-full text-sm font-bold logo-color bg-transparent border-0 border-b-2 border-green-200 appearance-none dark:text-gray-400 focus:outline-none focus:ring-0 focus:border-green-900 peer">
                        <option class="font-semibold bg-black logo-color" value="">
                            Выберите
                            город
                        </option>
                        <option class="font-semibold bg-black logo-color" value="Владивосток">
                            Владивосток (самовывоз)
                        </option>
                        <option class="font-semibold bg-black logo-color" value="other">
                            Другой
                        </option>
                    </select>
                </div>
            </div>
            <div class="flex w-full space-x-5">
                @if($other)
                    <div class="relative z-0 mb-6 w-1/2 group">
                        <label for="city" class="font-bold text-sm logo-color">Введите Ваш город:</label>
                        <input wire:model.lazy="city" name="city" id="city" value="{{ old('city') }}"
                               class="block py-2.5 px-0 w-full text-sm font-bold logo-color bg-transparent border-0 border-b-2 border-green-200 appearance-none dark:text-gray-400 focus:outline-none focus:ring-0 focus:border-green-900 peer"/>
                    </div>
                @endif
                @if($other)
                    <div class="relative z-0 mb-6 w-1/2 group">
                        <label for="index" class="font-bold text-sm logo-color">Почтовый индекс:</label>
                        <input name="index" id="index" value="{{ old('index') }}"
                               class="block py-2.5 px-0 w-full text-sm font-bold logo-color bg-transparent border-0 border-b-2 border-green-200 appearance-none dark:text-gray-400 focus:outline-none focus:ring-0 focus:border-green-900 peer"/>
                    </div>
                @endif
            </div>
            <div class="flex w-full space-x-5">
                @if($other)
                    <div class="relative z-0 mb-6 w-1/2 group">
                        <label for="address" class="font-bold text-sm logo-color">Адрес:</label>
                        <input name="address" id="address" value="{{ old('address') }}"
                               class="block py-2.5 px-0 w-full text-sm font-bold logo-color bg-transparent border-0 border-b-2 border-green-200 appearance-none dark:text-gray-400 focus:outline-none focus:ring-0 focus:border-green-900 peer"/>
                    </div>
                @endif
                @if($other)
                    <div class="relative z-0 mb-6 w-1/2 group">
                        <label for="house_number" class="font-bold text-sm logo-color">Номер дома:</label>
                        <input name="house_number" id="house_number" value="{{ old('house_number') }}"
                               class="block py-2.5 px-0 w-full text-sm font-bold logo-color bg-transparent border-0 border-b-2 border-green-200 appearance-none dark:text-gray-400 focus:outline-none focus:ring-0 focus:border-green-900 peer"/>
                    </div>
                @endif
            </div>

            <div class="relative z-0 mb-6 w-full group">
                <label for="comment" class="font-bold text-sm logo-color">Комментарий к заказу</label>
                <textarea id="comment" rows="4" name="comment"
                          class="mt-2 block p-2.5 w-full text-sm  bg-black rounded-lg border
                          placeholder-green-200 text-green-200 focus:outline-none placeholder-opacity-50 border-green-200 focus:ring-2
                          focus:border-green-900"
                          placeholder="Дополнительная информация">{{ old('comment') }}</textarea>
            </div>
            <div class="max-w-sm md:max-w-xl mx-auto lg:max-w-2xl text-sm font-bold logo-color mb-4">
                Итого: {{ $price }} RUB
            </div>
            <div class="max-w-sm md:max-w-xl mx-auto lg:max-w-2xl text-sm font-bold logo-color mb-4">
                {{ $delivery_option }}: {{ $shipment }} RUB
            </div>
            <div class="max-w-sm md:max-w-xl mx-auto lg:max-w-2xl text-sm font-bold logo-color mb-6">
                К оплате: {{ $price + $shipment }} RUB
            </div>
            <button type="submit" class="w-full">
                <div
                    class="w-full h-12 justify-center logo-color font-bold border-green-200 ml-0 bg-black hover:border-green-700 hover:bg-green-900 hover:text-green-200 focus:ring-green-900 focus:border-green-900 border-2 rounded-lg text-sm text-center inline-flex items-center mr-2 mb-2">
                    <svg aria-hidden="true" class="mr-2 -ml-1 w-10 h-3" viewBox="0 0 660 203" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M233.003 199.762L266.362 4.002H319.72L286.336 199.762H233.003V199.762ZM479.113 8.222C468.544 4.256 451.978 0 431.292 0C378.566 0 341.429 26.551 341.111 64.604C340.814 92.733 367.626 108.426 387.865 117.789C408.636 127.387 415.617 133.505 415.517 142.072C415.384 155.195 398.931 161.187 383.593 161.187C362.238 161.187 350.892 158.22 333.368 150.914L326.49 147.803L319.003 191.625C331.466 197.092 354.511 201.824 378.441 202.07C434.531 202.07 470.943 175.822 471.357 135.185C471.556 112.915 457.341 95.97 426.556 81.997C407.906 72.941 396.484 66.898 396.605 57.728C396.605 49.591 406.273 40.89 427.165 40.89C444.611 40.619 457.253 44.424 467.101 48.39L471.882 50.649L479.113 8.222V8.222ZM616.423 3.99899H575.193C562.421 3.99899 552.861 7.485 547.253 20.233L468.008 199.633H524.039C524.039 199.633 533.198 175.512 535.27 170.215C541.393 170.215 595.825 170.299 603.606 170.299C605.202 177.153 610.098 199.633 610.098 199.633H659.61L616.423 3.993V3.99899ZM551.006 130.409C555.42 119.13 572.266 75.685 572.266 75.685C571.952 76.206 576.647 64.351 579.34 57.001L582.946 73.879C582.946 73.879 593.163 120.608 595.299 130.406H551.006V130.409V130.409ZM187.706 3.99899L135.467 137.499L129.902 110.37C120.176 79.096 89.8774 45.213 56.0044 28.25L103.771 199.45L160.226 199.387L244.23 3.99699L187.706 3.996"
                            fill="#0E4595"/>
                        <path
                            d="M86.723 3.99219H0.682003L0 8.06519C66.939 24.2692 111.23 63.4282 129.62 110.485L110.911 20.5252C107.682 8.12918 98.314 4.42918 86.725 3.99718"
                            fill="#F2AE14"/>
                    </svg>
                    <div class="text-center">
                        Оплатить
                    </div>
                </div>
            </button>
        </form>
    </div>
</div>
