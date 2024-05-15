@extends('layouts.headerfoot')
@section('content')
    <x-setting heading="Crear un nuevo Post">
            <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="title" class="block">Título</label>
            <input class="border border-gray-200 mb-3 p-2 w-full rounded" name="title" id="title"/>

           <label for="slug" class="block">Slug</label>
           <input class="border border-gray-200 p-2 w-full rounded" name="slug"/>

           <label for="thumbnail" class="block">Imagen</label>
           <input class="border border-gray-200 p-2 w-full rounded" name="thumbnail" type="file"/>


           <label for="excerpt" class="block">Subtitulo</label>
            <textarea class="border border-gray-200 p-2 w-full rounded" name="excerpt"></textarea>

            <label for="body" class="block">Cuerpo</label>
            <textarea class="border border-gray-200 p-2 w-full rounded" name="body"></textarea>


            <div class="mt-6">
                <label for="category" class="block">Categoría</label>

               <select name="category_id" id="category_id" >

                @php
                $categories = \App\Models\Category::all();
                @endphp

                @foreach ($categories as $category)
                <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{ucwords($category->name)}}</option>
                @endforeach
               </select>

               @error("category")
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror

            </div>
            <div class="mt-6">
                <button class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600 "type="submit">Publicar</button>
            </div>



            </form>
    </x-setting>

@endsection
