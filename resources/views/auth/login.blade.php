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
            <form action="{{ route('register') }}" method="POST">
                {{-- @csrf genera un token --}}
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input id="name" name="name" type="text" placeholder="Tu nombre" {{-- Agregar una clase de error en caso de error en el campo 'name' --}}
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" {{-- Recuperar el valor anterior del input para que no se borre al enviar --}}
                        value="{{ old('name') }}">

                    {{--
                        Añadimos el mensaje de error que recibimos del método validate en el controlador.
                        Obtenemos el error desde el campo que los estamos recibiendo.
                    --}}
                    @error('name')
                        <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input id="username" name="username" type="text" placeholder="Tu nombre de usuario"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        {{-- Recuperar el valor anterior del input para que no se borre al enviar --}} value="{{ old('username') }}">

                    @error('username')
                        <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">{{ $message }}</p>
                    @enderror
                </div>

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
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                        Repetir contraseña
                    </label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                        placeholder="Repite tu contraseña" class="border p-3 w-full rounded-lg">
                </div>

                <input type="submit"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer text-white font-bold w-full p-3 rounded-lg"
                    value="Crear cuenta">
            </form>
        </div>
    </div>
@endsection
