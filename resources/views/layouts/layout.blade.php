<!doctype html>

<title>The Real South Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<style>

    .title {

        padding: 20px;
        position: relative;
        z-index: 2;
    }
    .clip-path-container {

        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
    }

    .colorss{
        background: linear-gradient(to right, #8469f8, #b296ff);
    }

    .grey{
        background: black;
        width: 100%;
        height: 53px;
    }

    .buttoncolor{
        background: linear-gradient(to right, #8c52ff, #1bdaff);
    }
    .scroll-top-button {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 999;
    background: linear-gradient(to right, #8c52ff, #1bdaff);
    color: #fff;
    padding: 10px;
    border-radius: 50%;
    text-decoration: none;
    display: none;
    transition: background-color 0.3s;
}

.scroll-top-button.show {
    display: block;
}

.scroll-top-button:hover {
    background-color: #0056b3;
}


.scroll-top-button i {
    font-size: 20px;
}
#banner {
            position: absolute;
            top: 0;
            left: 50px;
            width: 100%;
            z-index: 9999;
            padding: 10px 20px;

            animation: moveLeft 20s linear infinite;
        }

        #bannerContent a {
    display: flex;
    color: white;
    text-decoration: none;
    transition: color 0.3s ease-in-out;
}

        #bannerContent a:hover {
            color: #8c52ff;
        }


        @keyframes moveLeft {
    0% {
        transform: translateX(100%);
    }
    100% {
        transform: translateX(calc(-100% + 50px));
    }
}
</style>
<body style="font-family: Open Sans, sans-serif">
<div class="grey">

</div>
    <header class=" text-center  py-16 px-10  colorss" id="head">

        <div id="banner">

            <div id="bannerContent" class="flex justify-between">

                @php
                    use App\Models\Post;

                    $latestPosts = Post::latest()->take(6)->get();
                @endphp


                <p class="flex items-center text-sm font-semibold text-white">
                    <svg class="h-5 w-5 mr-1 text-red-500" width="10" height="10" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="9" />
                    </svg>
                <span>Las últimas noticias:</span>
            </p>

                @foreach($latestPosts as $post)

                <a href="/posts/{{$post->slug}}" class="text-sm font-semibold hover:underline"> | {{ $post->title }} </a>

                @endforeach

            </div>

        </div>

        <nav class="md:flex md:justify-between md:items-center">

            <div>

                <a href="/">
                    <img src="./images/logosm.png" alt="TRSB Logo" width="50" height="50">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">


                @auth
                <x-dropdown2>
                    <x-slot name="trigger">
                        <button class="text-xs font-bold uppercase">Welcome, {{auth()->user()->name}}!</button>
                    </x-slot>

                    @if (auth()->user()->username == 'josepablillo28')
                    <x-dropdown-item href="/admin/posts" :active="request()->is('admin/posts')" >Dashboard</x-dropdown-item>
                    <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">New Post</x-dropdown-item>

                    @endif


                    <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()" >Log Out</x-dropdown-item>

                    <form id="logout-form" action="/logout" method="post" class="hidden">

                        @csrf

                    </form>
                </x-dropdown2>




                @else
                <a href="/register" class="text-xs font-bold uppercase">Register</a>
                <a href="/login" class="ml-6 text-xs font-bold uppercase">Log In</a>

                @endauth
                <a href="#newsletter" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>
        <div class="flex flex-col justify-center items-center text-center">
        <h1 class="text-4xl title">
            <a href="/">
            <img src="./images/logomed.png" alt="TRSB Logo" width="350" height="350">
        </a>
        </h1>

        <div class="flex mt-6">
            <a href="{{ route('posts.index', ['category' => 'tecnologia']) }}" class="buttoncolor flex items-center rounded-full text-white uppercase py-3 px-6 mr-6 ml-6">
                <span class="mr-2">Tecnología</span>
                <svg class="h-6 w-6 text-gray-100" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z"/>
                    <line x1="3" y1="10" x2="3" y2="16" />
                    <line x1="21" y1="10" x2="21" y2="16" />
                    <path d="M7 9h10v8a1 1 0 0 1 -1 1h-8a1 1 0 0 1 -1 -1v-8a5 5 0 0 1 10 0" />
                    <line x1="8" y1="3" x2="9" y2="5" />
                    <line x1="16" y1="3" x2="15" y2="5" />
                    <line x1="9" y1="18" x2="9" y2="21" />
                    <line x1="15" y1="18" x2="15" y2="21" />
                </svg>
            </a>
            <a href="{{ route('posts.index', ['category' => 'videojuegos']) }}" class="buttoncolor flex items-center rounded-full text-white uppercase py-3 px-6 mr-6 ml-6">
                <span class="mr-2">Videojuegos</span>
                <svg class="h-8 w-8 text-gray-100"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z"/>  <rect x="2" y="6" width="20" height="12" rx="2" />  <path d="M6 12h4m-2 -2v4" />
                    <line x1="15" y1="11" x2="15" y2="11.01" />  <line x1="18" y1="13" x2="18" y2="13.01" /></svg>
            </a>

            <a href="{{ route('posts.index', ['category' => 'actualidad']) }}" class="buttoncolor flex items-center rounded-full text-white uppercase py-3 px-6 mr-6 ml-6">
                <span class="mr-2">Actualidad</span>
                <svg class="h-8 w-8 text-gray-100"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                  </svg>

            </a>
        </div>





    </div>

    </header>


    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @yield('content')
    </main>

    <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="./images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Todas las noticias que te interesan!</h5>
            <div class="flex justify-center mt-3 mb-3">
                <a href="#head">
                    <img src="./images/logosm.png" alt="TRSB Logo" width="50" height="50">
                </a>
            </div>
            <p class="text-sm mt-3">No te llenaremos el correo con basura. No somos malos!</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="#" class="lg:flex text-sm" id="footer">
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="./images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" type="text" placeholder="Your email address"
                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                        </div>

                        <button type="submit"
                        class="transition-colors duration-300 buttoncolor mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                >
                    Subscribete!
                </button>

                        <a href="#head" id="scrollTopButton" class="scroll-top-button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75 12 3m0 0 3.75 3.75M12 3v18" />
                              </svg>

                        </a>

                    </form>
                </div>
            </div>
        </footer>
    </section>
    <a href="#head" id="scrollTopButton" class="scroll-top-button">Subir</a>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Selecciona todos los enlaces internos que comienzan con #
        var links = document.querySelectorAll('a[href^="#"]');

        // Agrega un listener de clic a cada enlace
        links.forEach(function(link) {
            link.addEventListener('click', function(event) {
                // Previene el comportamiento predeterminado del enlace
                event.preventDefault();

                // Obtiene el objetivo del enlace (el elemento al que se está enlazando)
                var targetId = this.getAttribute('href').substring(1);
                var targetElement = document.getElementById(targetId);

                // Realiza el desplazamiento suave hasta el elemento objetivo
                targetElement.scrollIntoView({ behavior: 'smooth' });
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var scrollTopButton = document.getElementById('scrollTopButton');

    // Muestra u oculta el botón flotante en función de la posición de desplazamiento
    window.addEventListener('scroll', function() {
        if (window.scrollY > 100) {
            scrollTopButton.classList.add('show');
        } else {
            scrollTopButton.classList.remove('show');
        }
    });

    // Vuelve al inicio de la página cuando se hace clic en el botón
    scrollTopButton.addEventListener('click', function(event) {
        event.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});
</script>


