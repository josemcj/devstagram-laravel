<!--
    Llamamos al archivo de layouts/app. No es necesario colocar `.blade.php`
    y para acceder a carpetas, en vez de usar /, usamos un punto (.).
 -->
@extends('layouts.app')

<!--
    Inyectamos contenido al yield definido.
 -->
@section('titulo')
Inicio
@endsection

@section('contenido')
    Contenido de la página
@endsection
