@extends('layouts.app')

@section('titulo')
    Crea un post
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form
                action="{{ route('imagenes.store') }}"
                method="POST"
                enctype="multipart/form-data"
                id="dropzone"
                class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center"
            >
                @csrf
            </form>
        </div>
        <div class="md:w-1/2 px-10 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('register') }}" method="POST">
                {{-- @csrf genera un token --}}
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Título de la publicación
                    </label>
                    <input
                        id="titulo"
                        name="titulo"
                        type="text"
                        placeholder="Título de la publicación" {{-- Agregar una clase de error en caso de error en el campo 'name' --}}
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" {{-- Recuperar el valor anterior del input para que no se borre al enviar --}}
                        value="{{ old('titulo') }}"
                    >

                    {{--
                        Añadimos el mensaje de error que recibimos del método validate en el controlador.
                        Obtenemos el error desde el campo que los estamos recibiendo.
                    --}}
                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripción
                    </label>
                    <textarea
                        id="descripcion"
                        name="descripcion"
                        placeholder="Descripción de la publicación" {{-- Agregar una clase de error en caso de error en el campo 'name' --}}
                        class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror"
                    >
                            {{ old('descripcion') }}
                    </textarea>

                    {{--
                        Añadimos el mensaje de error que recibimos del método validate en el controlador.
                        Obtenemos el error desde el campo que los estamos recibiendo.
                    --}}
                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">{{ $message }}</p>
                    @enderror
                </div>

                <input type="submit"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer text-white font-bold w-full p-3 rounded-lg"
                    value="Publicar">
            </form>
        </div>
    </div>
@endsection
