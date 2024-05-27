<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Storage;

class PostController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Post::latest();



        // Filtrar por categoría si se proporciona
        if ($request->has('category')) {
            $categorySlug = $request->category;
            $query->whereHas('category', function ($query) use ($categorySlug) {
                $query->where('slug', $categorySlug);
            });
        }

        // Filtrar por otros criterios como la búsqueda o el autor
        $query->filter($request->only(['search', 'author']));

        $posts = $query->paginate(6)->withQueryString();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $firebase = (new Factory)
        ->withServiceAccount(__DIR__.'/path/to/firebase.php')
        ->createFirestore();

        $firebaseStorage = (new Factory)
        ->withServiceAccount(__DIR__.'/path/to/firebase.php')
        ->createStorage();

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Otros campos de validación para el post
        ]);

        $file = $request->file('image');
        $bucket = $firebaseStorage->getBucket();
        $object = $bucket->upload($file->get(), [
            'name' => 'images/' . $file->getClientOriginalName()
        ]);
        $imageUrl = $object->signedUrl(new \DateTime('2030-12-31'));

        // Crear el nuevo post en la base de datos
        $post = new Post();
        // Asignar otros campos del post
        $post->image_url = $imageUrl; // Guardar la URL de la imagen
        // Guardar el post
        $post->save();

        // Redirigir a la vista de detalle del post o a donde sea necesario
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post'=> $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
