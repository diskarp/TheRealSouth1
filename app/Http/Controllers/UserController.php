<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Storage;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function show($username)
    {


        // Buscar el usuario por su nombre
        $user = User::where('username', $username)->firstOrFail();

        return view('perfil.show', [
            'user' => $user
        ]);
    }

    public function edit($username)
    {
        // Buscar el usuario por su nombre
        $user = User::where('username', $username)->firstOrFail();

        // Asegurarse de que el usuario autenticado puede editar este perfil
        if (Auth::user()->username !== $user->username) {
            abort(403);
        }

        return view('perfil.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $username)
    {
        // Validar los datos del formulario
    $request->validate([
        'name' => 'required|string|max:255',
        'bio' => 'nullable|string|max:1000',
        'thumbnail' => 'nullable|image|max:2048',
        'birthdate' => 'nullable|date',
    ]);

    // Buscar el usuario por su nombre
    $user = User::where('username', $username)->firstOrFail();

    // Asegurarse de que el usuario autenticado puede actualizar este perfil
    if (Auth::user()->username !== $user->username) {
        abort(403);
    }

    // Actualizar los datos del usuario
    $user->name = $request->input('name');
    $user->bio = $request->input('bio');
    $user->birthdate = $request->input('birthdate');

    if ($request->hasFile('thumbnail')) {
        // Subir la nueva imagen de perfil
        $path = $request->file('thumbnail')->store('profilephotos', 'public');
        $user->thumbnail = $path;
    }

    // Guardar los cambios en la base de datos
    $user->update();

    return redirect()->route('perfil.show', ['username' => $user->username])->with('success', 'Perfil actualizado con éxito');
}
}
