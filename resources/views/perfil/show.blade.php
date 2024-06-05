@extends('layouts.headerfoot')
@section('content')
@auth
<main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">

<x-panel>
        <h1 class="text-2xl font-bold mb-4">Perfil de {{ auth()->user()->name }}</h1>
        <div class="mb-2">
        <img class="w-16 h-16 rounded-full object-cover mr-4 mb-3" src="{{asset('storage/' . auth()->user()->thumbnail)}}" alt="">
            <span class="text-gray-600">Username:</span>
            <span class="text-gray-800 font-medium">{{ auth()->user()->username }}</span>
        </div>
        <div class="mb-2">
            <span class="text-gray-600">Correo electrónico:</span>
            <span class="text-gray-800 font-medium">{{ auth()->user()->email }}</span>
        </div>
        <div class="mb-2">
            <span class="text-gray-600">Biografía:</span>
            <span class="text-gray-800 font-medium">{{ auth()->user()->bio ?? 'N/A' }}</span>
        </div>
        <div class="mb-2">
            <span class="text-gray-600">Fecha de nacimiento:</span>
            <span class="text-gray-800 font-medium">
            {{ old('birthdate', auth()->user()->birthdate ? (new DateTime(auth()->user()->birthdate))->format('Y-m-d') : 'N/A') }}
</span>
        </div>
        <a href="{{ route('perfil.edit', ['name' => auth()->user()->name]) }}" class="buttoncolor text-white px-4 py-2 rounded inline-block">Editar Perfil</a>

 </x-panel>
</main>
@endauth
@endsection
