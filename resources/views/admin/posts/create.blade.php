@extends('layouts.headerfoot')
@section('content')
    <x-setting heading="Crear un nuevo Post">
            <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="title" class="block mb-3 mt-2">Título</label>
            <input class="border border-gray-200 mb-3 p-2 w-full rounded" name="title" id="title"/>
            @error('title')
                        <div class="text-red-500 text-xs">
                            {{$message}}
                        </div>
                    @enderror

           <label for="slug" class="block mb-3 mt-2">Slug</label>
           <input class="border border-gray-200 p-2 w-full rounded" name="slug"/>
           @error('slug')
                        <div class="text-red-500 text-xs">
                            {{$message}}
                        </div>
                    @enderror

           <label for="thumbnail" class="block mb-3 mt-2">Imagen</label>
           <input class="border border-gray-200 p-2 w-full rounded" name="thumbnail" type="file"/>
           @error('thumbnail')
                        <div class="text-red-500 text-xs">
                            {{$message}}
                        </div>
                    @enderror


           <label for="excerpt" class="block mb-3 mt-2">Subtitulo</label>
            <textarea class="border border-gray-200 p-2 w-full rounded" name="excerpt"></textarea>
            @error('excerpt')
                        <div class="text-red-500 text-xs">
                            {{$message}}
                        </div>
                    @enderror

            <label for="body" class="block mb-3 mt-2">Cuerpo</label>
            <textarea class="editor-TinyMCE border border-gray-200 p-2 w-full rounded" id="body" name="body"></textarea>
            @error('body')
                        <div class="text-red-500 text-xs">
                            {{$message}}
                        </div>
                    @enderror


            <div class="mt-6">
                <label for="category" class="block mb-3 mt-2">Categoría</label>

               <select name="category_id" id="category_id" >

                @php
                $categories = \App\Models\Category::all();
                @endphp

                @foreach ($categories as $category)
                <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{ucwords($category->name)}}</option>
                @endforeach
               </select>

               @error("category")
                <p class="text-red-500 text-xs">{{$message}}</p>
                @enderror

            </div>
            <div class="mt-6">
                <button class="buttoncolor text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600 "type="submit">Publicar</button>
            </div>



            </form>
    </x-setting>
    <script src="https://cdn.tiny.cloud/1/0kvx8nknnrhgwuwari448rul4067afztv86du23lqkmwayo6/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
          selector: 'textarea.editor-TinyMCE',
          plugins: 'code table lists',
          toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
        });
      </script>
@endsection
