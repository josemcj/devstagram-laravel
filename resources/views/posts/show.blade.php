@extends('layouts.app')

@section('titulo')
   {{ $post->title }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex gap-5">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->image }}" alt="Imagen del post {{ $post->title }}">

            <div class="p-3">
                <p>0 likes</p>
            </div>

            <div>
                <p class="font-bold">
                    {{ $post->user->username }}
                </p>

                <p class="text-sm text-gray-500">
                    {{ $post->created_at->diffForHumans() }}
                </p>

                <p class="mt-5">
                    {{ $post->description }}
                </p>
            </div>
        </div>

        <div class="md:w-1/2">
            <div class="shadow bg-white p-5 mb-5">
                @auth
                    <p class="text-xl font-bold text-center mb-6">Agrega un nuevo comentario</p>

                    @if (session('message'))
                        <p class="bg-green-500 text-white my-2 p-2 rounded-lg text-sm text-center">{{ session('message') }}</p>
                    @endif

                    <form action="{{ route('comments.store', ['post' => $post]) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <textarea
                                id="comment"
                                name="comment"
                                placeholder="Descripción de la publicación"
                                class="border p-3 w-full rounded-lg @error('comment') border-red-500 @enderror"
                            >
                            </textarea>
                            @error('comment')
                                <p class="bg-red-500 text-white my-2 p-2 rounded-lg text-sm text-center">{{ $message }}</p>
                            @enderror
                        </div>

                        <input
                            type="submit"
                            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer text-white font-bold w-full p-3 rounded-lg"
                            value="Comentar"
                        >
                    </form>
                @endauth

                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                    @if ($post->comments->count())
                        @foreach ($post->comments as $comment)
                            <div class="p-5 border-gray-300 border-b">
                                <a
                                    href="{{ route('posts.index', $comment->user->username) }}"
                                    class="font-bold text-sm"
                                >
                                    {{ $comment->user->username }}
                                </a>

                                <p>{{ $comment->comment }}</p>
                                <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center text-gray-500 font-bold">No hay comentarios</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
