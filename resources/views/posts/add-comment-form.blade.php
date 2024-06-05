@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf

            <header class="flex items-center">
                @if(auth()->check() &&  isset(auth()->user()->thumbnail))
                <img src="{{asset('storage/' . auth()->user()->thumbnail)}}"
                     alt=""
                     width="40"
                     height="40"
                     class="w-16 h-16 rounded-full object-cover mr-4 mb-3">

                @else

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" width="30"
          height="30" stroke="currentColor" class="mb-3 mr-4 h-16 w-16 rounded-full object-cover">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
        </svg>
            @endif

                <h2 class="ml-4">¿Tienes algo que comentar sobre este post?</h2>
            </header>

            <div class="mt-6">
                <textarea
                    name="body"
                    class="w-full text-sm focus:outline-none focus:ring"
                    rows="5"
                    placeholder="Quick, thing of something to say!"
                    required></textarea>

                    @error("body")
                    <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
            </div>

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <div class="mt-6">
                    <button class="buttoncolor text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl "type="submit">
                        Comentar
                    </button>
                </div>

            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Regístrate</a> o
        <a href="/login" class="hover:underline">inicia sesión</a> para dejar un comentario.
    </p>
@endauth
