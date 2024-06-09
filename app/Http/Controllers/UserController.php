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

        $user = User::where('username', $username)->firstOrFail();

        return view('perfil.show', [
            'user' => $user
        ]);
    }

    public function edit($username)
    {

        $user = User::where('username', $username)->firstOrFail();

        if (Auth::user()->username !== $user->username) {
            abort(403);
        }

        return view('perfil.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $username)
    {

    $request->validate([
        'name' => 'required|string|max:255',
        'bio' => 'nullable|string|max:1000',
        'thumbnail' => 'nullable|image|max:2048',
        'birthdate' => 'nullable|date',
    ]);


    $user = User::where('username', $username)->firstOrFail();


    if (Auth::user()->username !== $user->username) {
        abort(403);
    }


    $user->name = $request->input('name');
    $user->bio = $request->input('bio');
    $user->birthdate = $request->input('birthdate');

    if ($request->hasFile('thumbnail')) {

        $path = $request->file('thumbnail')->store('profilephotos', 'public');
        $user->thumbnail = $path;
    }


    $user->update();

    return redirect()->route('perfil.show', ['username' => $user->username])->with('success', 'Perfil actualizado con éxito');
}
}
