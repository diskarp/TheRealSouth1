<!doctype html>

<title>The Real South Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<style>
    headerrr {
        background: linear-gradient(to right, #8469f8, #ffffff);
        padding: 20px;
        position: relative;
        z-index: 1;
        clip-path: polygon(100% 0, 0 0, 0 25%, 6% 27%, 11% 32%, 18% 35%, 29% 34%, 39% 31%, 46% 26%, 54% 24%, 59% 26%, 67% 30%, 74% 34%, 85% 33%, 100% 25%);
        height: 1200px;
    }
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
</style>
<body style="font-family: Open Sans, sans-serif">
    <header class=" text-center  py-16 px-10  colorss">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="./images/logosm.png" alt="TRSB Logo" width="50" height="50">
                </a>
            </div>

            <div class="mt-8 md:mt-0">
                <a href="/" class="text-xs font-bold uppercase">Página principal</a>

                <a href="#" class="buttoncolor ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>
        <div class="flex flex-col justify-center items-center text-center">
        <h1 class="text-4xl title">
            <img src="./images/logomed.png" alt="TRSB Logo" width="350" height="350">
        </h1>
        <h2 class="inline-flex mt-2 mb-6">By Jose Pablo</h2>
        <div class="flex mt-6">
            <button href="#" class="buttoncolor flex items-center rounded-full text-white uppercase py-3 px-6 mr-6 ml-6">
                Tecnología
                <img src="./images/tech-icon.png" class="h-6 w-6 ml-2" alt="Icono de mando de videojuegos">
            </button>
            <button href="#" class="buttoncolor flex items-center rounded-full text-white uppercase py-3 px-6 mr-6 ml-6">
                Videojuegos
                <img src="./images/gamepad-icon.png" class="h-6 w-6 ml-2" alt="Icono de mando de videojuegos">
            </button>

            <button href="#" class="buttoncolor flex items-center rounded-full text-white uppercase py-3 px-6 ">
                Actualidad
                <img src="./images/newspaper-icon.png" class="h-6 w-6 ml-2" alt="Icono de mando de videojuegos">
            </button>
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
                <a href="/">
                    <img src="./images/logosm.png" alt="TRSB Logo" width="50" height="50">
                </a>
            </div>
            <p class="text-sm mt-3">No te llenaremos el correo con basura. No somos malos!</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="#" class="lg:flex text-sm">
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="./images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" type="text" placeholder="Your email address"
                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                        </div>

                        <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>
</body>
