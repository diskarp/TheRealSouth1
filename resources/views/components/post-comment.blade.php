@props(['comment'])
<x-panel class="bg-gray-100">
<article class="flex space-x-4">

    <div class="flex-shrink-0">
    @if(auth()->user()?->thumbnail)
    <img src="{{ asset('storage/' . auth()->user()->thumbnail) }}" class="w-16 h-16 rounded-full object-cover mr-4 mb-3" alt="" width="60" height="60">
@else
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" width="30" height="30" stroke="currentColor" class="w-8 h-8 rounded-full object-cover mr-4 mb-3">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
</svg>

@endif
    </div>

    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{$comment->author->username}}</h3>
            <p class="text-xs">Posted <time>{{$comment->created_at->format('F j, Y, g:i a')}}</time></p>
        </header>
        <p>
            {{$comment->body}}
        </p>
    </div>
</article>
</x-panel>
