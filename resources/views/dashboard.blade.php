@extends('layouts.app')

@section('titulo')
    Perfil de {{ $user->username }}
@endsection

@section('contenido')
    <div class="flex justify-center items-center gap-5 md:gap-11">
        <div class="w-3/12 md:w-20 lg:w-32">
            <img class="content-end" src="{{ asset('img/usuario.svg') }}" alt="Imagen de usuario">
        </div>
        <div class="content-start">
            <h2 class="font-bold text-xl mb-5">{{ $user->username }}</h2>

            <div class="flex gap-4 md:gap-6">
                <div class="flex flex-col md:flex-row text-gray-500 text-center">
                    <p class="font-bold md:mr-1">0</p>
                    <p>publicaciones</p>
                </div>

                <div class="flex flex-col md:flex-row text-gray-500 text-center">
                    <p class="font-bold md:mr-1">0
                    <p>seguidores</p>
                </div>

                <div class="flex flex-col md:flex-row text-gray-500 text-center">
                    <p class="font-bold md:mr-1">0</p>
                    <p>siguiendo</p>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/usuario.svg') }}" alt="Imágen de usuario">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10">
                <p class="text-gray-700 text-2xl font-bold mb-3">{{ $user->username }}</p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0 <span class="font-normal">posts</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0 <span class="font-normal">seguidores</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0 <span class="font-normal">siguiendo</span>
                </p>
            </div>
        </div>
    </div> --}}
@endsection
