@props(['comment'])
<x-panel class="bg-gray-100">
  <article class="flex space-x-4">

    <div class="flex-shrink-0">
      @if ($comment->author?->thumbnail)
        <img src="{{ asset('storage/' . $comment->author->thumbnail) }}"
          class="mb-3 mr-4 h-16 w-16 rounded-full object-cover" alt="" width="60" height="60">
      @else
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" width="30"
          height="30" stroke="currentColor" class="mb-3 mr-4 h-8 w-8 rounded-full object-cover">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
        </svg>
      @endif
    </div>

    <div>
      <header class="mb-4">
        @if ($comment->author)
          <h3 class="font-bold">{{ $comment->author->username }}</h3>
          <p class="text-xs">Posted <time>{{ $comment->created_at->format('F j, Y, g:i a') }}</time></p>
        @else
          <h3 class="font-bold">Unknown Author</h3>
          <p class="text-xs">Posted <time>{{ $comment->created_at->format('F j, Y, g:i a') }}</time></p>
        @endif
      </header>
      <p>
        {{ $comment->body }}
      </p>
      @if (auth()->check() && auth()->user()->username == 'josepablillo28')
        <form method="POST" action="{{ route('comments.destroy', $comment) }}">
          @csrf
          @method('DELETE')

          <button type="submit" class="text-xs text-red-500"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="20" height="20" class="size-6 mt-4">
  <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
</svg>
</button>
        </form>
      @endif
    </div>
  </article>
</x-panel>
