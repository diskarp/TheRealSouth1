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
        background: linear-gradient(to right, #8469f8, #ffffff);
    }

    .buttoncolor{
        background: linear-gradient(to right, #8c52ff, #1bdaff);
    }
    .scroll-top-button {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 999;
    background-color: #007bff;
    color: #fff;
    padding: 10px;
    border-radius: 50%; /* Hace que el botón sea redondo */
    text-decoration: none;
    display: none; /* Oculta el botón por defecto */
    transition: background-color 0.3s; /* Agrega una transición suave */
}

.scroll-top-button.show {
    display: block; /* Muestra el botón cuando sea necesario */
}

.scroll-top-button:hover {
    background-color: #0056b3; /* Cambia el color de fondo al pasar el cursor */
}

/* Estilos para el ícono de flecha */
.scroll-top-button i {
    font-size: 20px;
}
</style>
<body style="font-family: Open Sans, sans-serif">
    <header class=" text-center  py-16 px-10  colorss" id="head">
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
        <h2 class="inline-flex mt-2 mb-6">By Jose Pablo</h2>
        <div class="flex mt-6">
            <a href="{{ route('posts.index', ['category' => 'tecnologia']) }}" class="buttoncolor flex items-center rounded-full text-white uppercase py-3 px-6 mr-6 ml-6">
                Tecnología
                <img src="./images/tech-icon.png" class="h-6 w-6 ml-2" alt="Icono de mando de videojuegos">
            </a>
            <a href="{{ route('posts.index', ['category' => 'videojuegos']) }}" class="buttoncolor flex items-center rounded-full text-white uppercase py-3 px-6 mr-6 ml-6">
                Videojuegos
                <img src="./images/gamepad-icon.png" class="h-6 w-6 ml-2" alt="Icono de mando de videojuegos">
            </a>

            <a href="{{ route('posts.index', ['category' => 'actualidad']) }}" class="buttoncolor flex items-center rounded-full text-white uppercase py-3 px-6 mr-6 ml-6">
                Actualidad
                <img src="./images/newspaper-icon.png" class="h-6 w-6 ml-2" alt="Icono de mando de videojuegos">
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

