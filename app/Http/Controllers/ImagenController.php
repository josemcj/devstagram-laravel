<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        // $input = $request->all();
        $image = $request->file('file');
        $image_name = Str::uuid() . '.' . $image->extension();

        $image_server = Image::make($image);
        // Ajustar tamaño de la imagen
        $image_server->fit(1000, 1000);

        // Crear el path de la imagen
        $image_path = public_path('uploads') . '/' . $image_name;

        // Subir imagen al servidor
        $image_server->save($image_path);

        return response()->json(['imagen' => $image_name]);
    }

    
}
