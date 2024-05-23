@extends('layouts.headerfoot')
@section('content')
<main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">

        <h1 class="text-2xl font-bold mb-4">Perfil de {{ $user->name }}</h1>
        <div class="mb-2">
            <span class="text-gray-600">Username:</span>
            <span class="text-gray-800 font-medium">{{ $user->username }}</span>
        </div>
        <div class="mb-2">
            <span class="text-gray-600">Correo electrónico:</span>
            <span class="text-gray-800 font-medium">{{ $user->email }}</span>
        </div>



</main>

@endsection
