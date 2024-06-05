@extends('layouts.headerfoot')
@section('content')
@auth
<main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">

<x-panel>
        <h1 class="text-2xl font-bold mb-4">Perfil de {{ auth()->user()->username }}</h1>
        <div class="mb-2">
        @if (auth()->check() && isset(auth()->user()->thumbnail))

        <img class="w-16 h-16 rounded-full object-cover mr-4 mb-3" src="{{asset('storage/' . auth()->user()->thumbnail)}}" alt="">

        @else

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" width="30"
          height="30" stroke="currentColor" class="mb-3 mr-4 h-16 w-16 rounded-full object-cover">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
        </svg>

        @endif
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
        <a href="{{ route('perfil.edit', ['username' => auth()->user()->username]) }}" class="buttoncolor text-white px-4 py-2 rounded inline-block mt-3">Editar Perfil</a>

 </x-panel>
</main>
@endauth
@endsection
