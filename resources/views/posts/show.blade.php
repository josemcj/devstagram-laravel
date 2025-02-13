@extends('layouts.app')

@section('titulo')
   {{ $post->title }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex gap-5">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->image }}" alt="Imagen del post {{ $post->title }}">

            <div class="p-3 flex items-center gap-2">
                @auth
                    @if ($post->checkLike(auth()->user()))
                        <form action="{{ route('posts.likes.destroy', $post) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="my-4">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    @else
                        <form action="{{ route('posts.likes.store', $post) }}" method="POST">
                            @csrf
                            <div class="my-4">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    @endif

                @endauth
                <p>{{ $post->likes->count() }} {{ $post->likes->count() === 1 ? 'like' : 'likes' }}</p>
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

            @auth
                @if ($post->user_id === auth()->user()->id)
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        {{-- Method spoofing --}}
                        @method('DELETE')
                        @csrf
                        <input
                            type="submit"
                            class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer"
                            value="Eliminar publicación"
                        >
                    </form>
                @endif
            @endauth
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
