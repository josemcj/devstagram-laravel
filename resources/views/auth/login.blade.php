@extends('layouts.app')

@section('titulo')
    Inicia sesión en Devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-4 md:items-center">
        <div class="md:w-5/12">
            <img class="rounded-lg" src="{{ asset('img/login.jpg') }}" alt="Crea una cuenta en Devstagram">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="POST" action="{{ route('login') }}" novalidate>
                {{-- @csrf genera un token --}}
                @csrf

                @if (session('mensaje'))
                    <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">{{ session('mensaje') }}</p>
                @endif

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input id="email" name="email" type="email" placeholder="Tu correo electrónico"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" {{-- Recuperar el valor anterior del input para que no se borre al enviar --}}
                        value="{{ old('email') }}">

                    @error('email')
                        <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Contraseña
                    </label>
                    <input id="password" name="password" type="password" placeholder="Tu contraseña"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"
                        {{-- Recuperar el valor anterior del input para que no se borre al enviar --}} value="{{ old('password') }}">

                    @error('password')
                        <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember" class="text-gray-500 font-bold text-sm">Mantener mi sesión abierta</label>
                </div>

                <input type="submit"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer text-white font-bold w-full p-3 rounded-lg"
                    value="Iniciar sesión">
            </form>
        </div>
    </div>
@endsection
