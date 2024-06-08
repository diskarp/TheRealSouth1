<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensaje;
use App\Models\User;

class MensajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mensajes = Mensaje::with('user')->get();
        $users = User::all();
        return view('foro.index', compact('mensajes', 'users'));
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
        $request->validate([
            'cuerpo' => 'required|string',
        ]);

        $mensaje = Mensaje::create([
            "user_id"=> $request->user()->id,
            "cuerpo"=> $request->input('cuerpo')
        ]);

        $mensaje->save();
        return redirect()->route('foro.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mensajes = Mensaje::with('user')->get();
        return view('foro.show', compact('mensajes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mensaje $mensaje)
    {
        $mensaje->delete();

        return back()->with('success', 'Mensaje fuera!');
    }
}
