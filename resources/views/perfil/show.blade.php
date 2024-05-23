@extends('layouts.headerfoot')
@section('content')
<main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">

        <h1 class="text-2xl font-bold mb-4">Perfil de {{ $user->name }}</h1>
        <div class="mb-2">
        <img class="w-16 h-16 rounded-full object-cover mr-4" src="{{ $user->thumbnail }}" alt="Foto de perfil de {{ $user->name }}">
            <span class="text-gray-600">Username:</span>
            <span class="text-gray-800 font-medium">{{ $user->username }}</span>
        </div>
        <div class="mb-2">
            <span class="text-gray-600">Correo electrónico:</span>
            <span class="text-gray-800 font-medium">{{ $user->email }}</span>
        </div>
        <div class="mb-2">
            <span class="text-gray-600">Biografía:</span>
            <span class="text-gray-800 font-medium">{{ $user->bio ?? 'N/A' }}</span>
        </div>
        <div class="mb-2">
            <span class="text-gray-600">Fecha de nacimiento:</span>
            <span class="text-gray-800 font-medium">
    {{ $user->birthdate ? \Carbon\Carbon::parse($user->birthdate)->format('d/m/Y') : 'N/A' }}
</span>
        </div>
        <a href="{{ route('perfil.edit', ['name' => auth()->user()->name]) }}" class="bg-blue-500 text-white px-4 py-2 rounded inline-block">Editar Perfil</a>


</main>

@endsection
