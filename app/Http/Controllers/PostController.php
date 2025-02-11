<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function __construct()
    {
        /**
         * El middleware es el primero que se ejecuta antes que cualquier otra cosa.
         * con este método `middleware` indicamos que se debe ejecutar el método `auth`
         * que verificará la sesión.
         * Si no hay una sesión activa redirecciona a `/login`.
         */
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->paginate(8);

        // Otra forma (no se puede paginar)
        // $user->posts;

        /**
         * Pasamos informacion a la vista en el segundo parametro que toma esta funcion.
         */
        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show(User $user, Post $post)
    {
        return view('posts.show', [
            'user' => $user,
            'post' => $post
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'image' => 'required'
        ]);

        /**
         * Forma 1 de crear.
         */
        Post::create([
            'title' => $request->titulo,
            'description' => $request->descripcion,
            'image' => $request->image,
            'user_id' => auth()->user()->id
        ]);

        /**
         * Forma 2 de crear.
         */
        // $post = new Post;
        // $post->title = $request->titulo;
        // $post->description = $request->descripcion;
        // $post->image = $request->image;
        // $post->user_id = auth()->user()->id;
        // $post->save();

        /**
         * Una vez que se tiene la relacion con los metodos `hasMany` y `belongsTo`, podemos crear un posts de la
         * siguiente manera.
         */
        // $request->user()->posts()->create([
        //     'title' => $request->titulo,
        //     'description' => $request->descripcion,
        //     'image' => $request->image
        // ]);

        return redirect()->route('posts.index', auth()->user()->username);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        /**
         * Eliminar imagen
         */
        $imagePath = public_path('uploads/' . $post->image);

        if (File::exists($imagePath)) {
            // unlink($imagePath);
            File::delete($imagePath);
        }

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
