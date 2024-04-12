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

            <nav class="flex gap-2 items-center">
                <a class="font-bold text-gray-600 text-sm" href="{{ route('login') }}">Login</a>
                <a class="font-bold text-gray-600 text-sm" href="{{ route('register') }}">Crear cuenta</a>
            </nav>
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
