<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Storage;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function show($name)
    {


        // Buscar el usuario por su nombre
        $user = User::where('name', $name)->firstOrFail();

        return view('perfil.show', [
            'user' => $user
        ]);
    }

    public function edit($name)
    {
        // Buscar el usuario por su nombre
        $user = User::where('name', $name)->firstOrFail();

        // Asegurarse de que el usuario autenticado puede editar este perfil
        if (Auth::user()->name !== $user->name) {
            abort(403);
        }

        return view('perfil.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $name)
    {
        // Validar los datos del formulario
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'bio' => 'nullable|string|max:1000',
            'thumbnail' => 'nullable|image|max:2048',
            'birthdate' => 'nullable|date',
        ]);

        // Buscar el usuario por su nombre
        $user = User::where('name', $name)->firstOrFail();

        // Asegurarse de que el usuario autenticado puede actualizar este perfil
        if (Auth::user()->name !== $user->name) {
            abort(403);
        }

        // Actualizar los datos del usuario
        $user->username = $request->input('username');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->bio = $request->input('bio');
        $user->birthdate = $request->input('birthdate');

        if ($request->hasFile('thumbnail')) {
            // Subir la nueva imagen de perfil
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $user->thumbnail = $path;
        }

        $user->save();

        return redirect()->route('perfil.show', ['name' => $user->name])->with('success', 'Perfil actualizado con éxito');
    }
}
