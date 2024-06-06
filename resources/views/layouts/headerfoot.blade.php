<!doctype html>

<title>The Real South Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<style>
    .title {
        padding: 20px;
        position: relative;
        z-index: 2;
    }
    .colorss {
    background: linear-gradient(to right, #8469f8, #FFFFFF);
  }
    .buttoncolor {
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
    border-radius: 50%; /* Hace que el botón sea redondo */
    text-decoration: none;
    display: none; /* Oculta el botón por defecto */
    transition: background-color 0.3s; /* Agrega una transición suave */
}
    .scroll-top-button.show {
        display: block;
    }
</style>
<body style="font-family: Open Sans, sans-serif">
    <header class=" text-center  py-8 px-10  colorss">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/" class="hidden md:block">
                    <img src="/images/logosm.png"  width="50" height="50">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex inline-block">
                <a href="/" class="text-xs font-bold uppercase"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="20" height="20" stroke-width="1.5" stroke="currentColor" class="size-6 mr-3 mt-2">
  <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
</svg>
</a>

                <a href="#newsletter"
          class="buttoncolor ml-3 rounded-full px-5 py-3 text-xs font-semibold uppercase text-white">
          Suscríbete
        </a>
            </div>
        </nav>
        <div class="flex flex-col justify-center items-center text-center">
        <h1 class="text-4xl title">
        <a href="/">
            <img src="/images/logomed.png" width="350" height="350">
            </a>
        </h1>


    </div>
    </header>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6 ">
        @yield('content')
    </main>

    <footer class="colorss rounded-xl text-center py-16 px-10 mt-16">

            <h5 class="text-3xl font-bold ">Todas las noticias que te interesan!</h5>
            <div class="flex justify-center mt-5 mb-3">
                <a href="/">
                    <img src="/images/logosm.png" alt="TRSB Logo" width="50" height="50">
                </a>
            </div>
            <h6 class="mt-3 font-bold">No te llenaremos el correo con basura. No somos malos!</h6>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                <form method="POST" action="/newsletter" class="text-sm lg:flex" id="newsletter">
            @csrf
          <div class="flex items-center lg:px-5 lg:py-3">
            <label for="email" class="hidden lg:inline-block">
              <img src="/images/mailbox-icon.svg" alt="mailbox letter">
            </label>

            <div>
            <input id="email" name="email" type="text" placeholder="Pon tu correo aquí!"
              class="py-2 pl-4 focus-within:outline-none lg:bg-transparent lg:py-0">

              @error('email')
                                   <span class="text-xs text-red-500">{{ $message }}</span>
                               @enderror
                               </div>
          </div>

          <button type="submit"
            class="buttoncolor mt-4 rounded-full px-8 py-3 text-xs font-semibold uppercase text-white transition-colors duration-300 lg:ml-3 lg:mt-0">
            Suscríbete!
          </button>

          <a href="#head" id="scrollTopButton" class="scroll-top-button">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75 12 3m0 0 3.75 3.75M12 3v18" />
            </svg>

          </a>

        </form>
                </div>
            </div>
        </footer>
        <a href="#head" id="scrollTopButton" class="scroll-top-button">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75 12 3m0 0 3.75 3.75M12 3v18" />
              </svg>

        </a>

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
</body>

