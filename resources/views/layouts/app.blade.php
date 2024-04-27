<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>@yield('titulo') | DevStagram</title>
</head>

<body class="bg-gray-100">
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between">
            <h1 class="text-3xl font-black">
                Devstagram
            </h1>

            {{-- Si el usuario esta autenticado --}}
            @auth
                <nav class="flex gap-2 items-center">
                    <a class="flex items-center gap-2 bg-white border py-2 px-3 text-gray-600 rounded text-sm font-bold cursor-pointer" href="{{ route('posts.create') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>

                        Crear
                    </a>

                    <a class="font-bold text-gray-600 text-sm" href="{{ route('posts.index', auth()->user()->username) }}">
                        Hola <span class="font-normal">{{ auth()->user()->username }}</span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="font-bold text-gray-600 text-sm">Cerrar sesión</button>
                    </form>
                </nav>
            @endauth

            {{-- Si el usuario no esta autenticado --}}
            @guest
                <nav class="flex gap-2 items-center">
                    <a class="font-bold text-gray-600 text-sm" href="{{ route('login') }}">Login</a>
                    <a class="font-bold text-gray-600 text-sm" href="{{ route('register') }}">Crear cuenta</a>
                </nav>
            @endguest
        </div>
    </header>

    <main class="container mx-auto mt-10">
        <h2 class="font-black text-3xl text-center mb-10">
            @yield('titulo')
        </h2>

        @yield('contenido')
    </main>

    <footer class="mt-10 text-center p-5 text-gray-500 font-bold">
        {{--
            Imprimimos información con las dobles llaves, como en Angular.
            Ya que solo es para imprimir, podemos usar @php echo ... @endphp para
            abrir y cerrar contenido de php.

            En este caso, la función now() es un helper que nos da la fecha actual.
        --}}
        Devstagram - Todos los derechos resevados {{ now()->year }}.
    </footer>
</body>

</html>
