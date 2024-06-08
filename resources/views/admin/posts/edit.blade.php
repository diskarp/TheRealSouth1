@extends('layouts.headerfoot')
@section('content')
    <x-setting :heading="'Editar un post:' . $post->title">
            <form action="/admin/posts/{{$post->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
           <label for="title" class="block mb-3 mt-2">Título</label>
           <input class="border border-gray-200 mb-3 p-2 w-full rounded" name="title" id="title" value="{{old('title',$post->title)}}"/>

           <label  class="block mb-3 mt-2" for="slug" >Slug</label>
           <input class="border border-gray-200 p-2 w-full rounded" name="slug" id="slug" value="{{old('slug',$post->slug)}}"/>

            <div class="flex mt-6">
                <div class="flex-1">
                    <input name="thumbnail" type="file" :value="{{old('thumbnail',$post->thumbnail)}}"/>
                </div>

            <img src="{{asset('storage/' . $post->thumbnail)}}" alt="" class="rounded-xl ml-6" width="100">

        </div>

            <label for="excerpt" class="block mb-3 mt-2">Subtitulo</label>
            <textarea class="border border-gray-200 p-2 w-full rounded" name="excerpt">{{old('excerpt', $post->excerpt)}}</textarea>
            @error('excerpt')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            <label for="body" class="block mb-3 mt-2">Cuerpo</label>
            <textarea class="editor-TinyMCE border border-gray-200 p-2 w-full rounded" id="body" name="body">{{old('body', $post->body)}}</textarea>
            @error('body')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror


            <label for="category" class="block text-gray-700">Categoría</label>
               <select name="category_id" id="category_id" >

                @php
                $categories = \App\Models\Category::all();
                @endphp

                @foreach ($categories as $category)
                <option value="{{$category->id}}" {{old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}>{{ucwords($category->name)}}</option>
                @endforeach
               </select>

               @error('category')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror



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
