@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}"
                     alt=""
                     width="40"
                     height="40"
                     class="rounded-full">

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
