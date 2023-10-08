@extends('app')

@section('confidentiality')
    <div class="mx-auto w-2/3 mt-8 space-y-3 max-w-6xl mb-4">
        <form action="/admin/login/store" method="POST">
            @csrf
            <div class="mb-6">
                <label for="login"
                       class="block mb-2 text-sm font-semibold text-green-200">Логин:</label>
                <input id="login" name="login"
                       class="bg-black border-b border-b-green-200 placeholder-green-200 text-green-200 text-sm focus:outline-none rounded-lg block w-full p-2.5"
                       placeholder="Введите логин"
                       value="{{ old('login') }}">
            </div>
            <div class="mb-6">
                <label for="password"
                       class="block mb-2 text-sm font-semibold text-green-200">Пароль:</label>
                <input type="password" id="password" name="password"
                       class="bg-black border-b border-b-green-200 placeholder-green-200 text-green-200 text-sm focus:outline-none rounded-lg block w-full p-2.5"
                       placeholder="Введите пароль"
                       value="">
            </div>
            <button type="submit"
                    class="text-green-200 bg-black rounded-lg hover:bg-green-900 hover:border-green-900 border-green-200 border-2 focus:bg-green-900 focus:border-green-900 font-semibold text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                Войти
            </button>
        </form>
    </div>
@endsection
