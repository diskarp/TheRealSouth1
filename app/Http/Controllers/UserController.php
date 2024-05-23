<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Storage;

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
}
