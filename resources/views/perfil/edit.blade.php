@extends('layouts.headerfoot')
@section('content')

    <div class="bg-white shadow-lg rounded-lg p-6 max-w-full w-full md:w-2/3 lg:w-1/2 mx-auto">
        <h1 class="text-2xl font-bold mb-4">Editar Perfil</h1>
        <form action="{{ route('perfil.update', ['username' => auth()->user()->username]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="username" class="block text-gray-700">Username</label>
                <input type="text" name="username" id="username" value="{{ old('username', auth()->user()->username) }}" class="w-full p-2 border border-gray-300 rounded mt-1">
                @error('username')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nombre</label>
                <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}" class="w-full p-2 border border-gray-300 rounded mt-1">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Correo electrónico</label>
                <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" class="w-full p-2 border border-gray-300 rounded mt-1">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="bio" class="block text-gray-700">Biografía</label>
                <textarea name="bio" id="bio" rows="3" class="w-full p-2 border border-gray-300 rounded mt-1">{{ old('bio', auth()->user()->bio) }}</textarea>
                @error('bio')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="birthdate" class="block text-gray-700">Fecha de nacimiento</label>
                <input type="date" name="birthdate" id="birthdate" value="{{ old('birthdate', auth()->user()->birthdate ? (new DateTime(auth()->user()->birthdate))->format('Y-m-d') : '') }}" class="w-full p-2 border border-gray-300 rounded mt-1">
                @error('birthdate')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="thumbnail" class="block text-gray-700">Foto de perfil</label>
                <input type="file" name="thumbnail" id="thumbnail" class="w-full p-2 border border-gray-300 rounded mt-1">
                @error('thumbnail')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
            <button type="submit" class="buttoncolor text-white px-4 py-2 rounded">Actualizar Perfil</button>
            </div>
        </form>
    </div>

@endsection
