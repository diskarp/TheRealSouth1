@extends('layouts.layout')
@section('content')

<x-setting heading="Crear un nuevo Post">
@auth

    <div class="colorss border-gray-200 p-6 rounded-xl">

    <h1 class="font-bold text-xl">Bienvenid@s al foro de The Real South Blog</h1>

    <p class="text-sm mt-2 ">No toleramos actitudes que puedan ofender a otros usuarios, usen el foro de manera oportuna y disfruten de la comunidad.</p>

    </div>

    <ul class="border bg-purple-100 border-gray-200 p-6 rounded-xl">
        @foreach($mensajes as $mensaje)
        @php
                $red = mt_rand(0, 200);
                $green = mt_rand(0, 200);
                $blue = mt_rand(0, 200);
                $color = sprintf('#%02X%02X%02X', $red, $green, $blue);
            @endphp
            <li class="mb-2 @if($mensaje->user_id === auth()->id()) text-right @else text-left @endif">
                    <strong style="color: {{ $color }}">{{ $mensaje->user->name }}:</strong> {{ $mensaje->cuerpo }}
                    <br>
                    <p class="text-xs text-gray-400">{{ $mensaje->created_at->format('d/m/Y H:i') }}</p>
                </li>
        @endforeach
    </ul>


    <form class="border border-gray-200 p-3 rounded-xl" action="{{ route('foro.store') }}" method="POST">
        @csrf
        <div>
            <label for="cuerpo">Mensaje:</label>
            <div class="mt-6">
                <textarea
                    name="cuerpo"
                    id="cuerpo"
                    class="w-full text-sm focus:outline-none focus:ring"
                    rows="5"
                    placeholder="Empieza escribiendo algo!"
                    required></textarea>

                    @error("cuerpo")
                    <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
            </div>
        </div>
        <div>

        </div>
        <button class="buttoncolor text-white uppercase font-semibold text-xs py-2 px-10 mt-3 rounded-2xl "type="submit">
                        Comentar
                    </button>
    </form>

@else
<p class="font-semibold">
        <a href="/register" class="hover:underline">Regístrate</a> o
        <a href="/login" class="hover:underline">inicia sesión</a> para dejar un comentario.

    </p>
</x-setting>
@endauth
@endsection
