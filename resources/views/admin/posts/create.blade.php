@extends('layouts.headerfoot')
@section('content')
    <x-setting heading="Publish New Post">
            <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf

            <input class="border border-gray-200 p-2 w-full rounded" name="title" id="name"/>
           <input class="border border-gray-200 p-2 w-full rounded" name="slug"/>
           <input class="border border-gray-200 p-2 w-full rounded" name="thumbnail" type="file"/>



            <textarea class="border border-gray-200 p-2 w-full rounded" name="excerpt"></textarea>

            <textarea class="border border-gray-200 p-2 w-full rounded" name="body"></textarea>


            <div class="mt-6">
                <input class="border border-gray-200 p-2 w-full rounded" name="category"/>
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
                <button class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600 "type="submit">Publish</button>
            </div>



            </form>
    </x-setting>

@endsection
