<!doctype html>

<title>The Real South Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<head>
<style>

body, html {
    height: 100%;
}

body {
    height: 100vh;
    margin: 0;
}

main {
    min-height: 70%;
}



  .title {
    padding: 20px;
    position: relative;
    z-index: 2;
  }

  .colorss {
    background: linear-gradient(to right, #8469f8, #FFFFFF);
  }

  .content {
      flex: 1;
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
    border-radius: 50%;

    text-decoration: none;
    display: none;

    transition: background-color 0.3s;

  }

  .scroll-top-button.show {
    display: block;
  }
</style>
</head>
<body>
  <header class="colorss px-10 py-8 text-center">
    <nav class="md:flex md:items-center md:justify-between">
      <div>
        <a href="/" class="hidden md:block">
          <img src="/images/logosm.png" width="50" height="50">
        </a>
      </div>

      <div class="mt-8 inline-block flex md:mt-0">
        <a href="/" class="text-xs font-bold uppercase"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" width="20" height="20" stroke-width="1.5" stroke="currentColor"
            class="size-6 mr-3 mt-2">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
          </svg>
        </a>

        <a href="#newsletter"
          class="buttoncolor ml-3 rounded-full px-5 py-3 text-xs font-semibold uppercase text-white">
          Suscríbete
        </a>
      </div>
    </nav>
    <div class="flex flex-col items-center justify-center text-center">
      <h1 class="title text-4xl">
        <a href="/">
          <img src="/images/logomed.png" width="350" height="350">
        </a>
      </h1>

    </div>
  </header>
  <main class="content mx-auto mt-6 max-w-6xl space-y-6 lg:mt-20">
    @yield('content')
  </main>
  <x-flash />
  <footer class="colorss mt-16 rounded-xl px-10 py-16 text-center">

    <h5 class="text-3xl font-bold">Todas las noticias que te interesan!</h5>
    <div class="mb-3 mt-5 flex justify-center">

    </div>
    <h6 class="mt-3 font-bold">No te llenaremos el correo con basura. No somos malos!</h6>

    <div class="mt-10">
      <div class="relative mx-auto inline-block rounded-full lg:bg-gray-200">

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
    <div class="mt-3 flex items-center justify-center">
      <p>Y si nos das un buen follow?</p>
    </div>
    <div class="mt-3 flex items-center justify-center">
      <a href="https://www.instagram.com/diskarp/">
        <img class="mr-3" src="/images/insta.png" alt="instagram logo" width="30" height="30">
      </a>
      <a href="https://www.twitch.tv/imdiskarp">
        <img class="mr-3" src="/images/twitch.png" alt="twitch logo" width="30" height="30">
      </a>
      <a href="https://open.spotify.com/intl-es/artist/0qfFcAYVhSMBYl7AH1Wzta?si=zquict8hSu2783lPKZ1dRA">
        <img class="mr-3" src="/images/spoti.png" alt="twitch logo" width="30" height="30">
      </a>
      <a href="https://www.threads.net/@diskarp?hl=es">
        <img class="mr-3" src="/images/threads.png" alt="threads logo" width="30" height="30">
      </a>
      <a href="https://www.youtube.com/@diskarp">
        <img class="mr-3" src="/images/youtube.png" alt="youtube logo" width="30" height="30">
      </a>
      <a href="{{ route('aboutus') }}">
        <img src="/images/logosm.png" alt="TRSB Logo" width="30" height="30">
      </a>
    </div>
  </footer>

  <a href="#head" id="scrollTopButton" class="scroll-top-button">Subir</a>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {

    var links = document.querySelectorAll('a[href^="#"]');


    links.forEach(function(link) {
      link.addEventListener('click', function(event) {

        event.preventDefault();


        var targetId = this.getAttribute('href').substring(1);
        var targetElement = document.getElementById(targetId);


        targetElement.scrollIntoView({
          behavior: 'smooth'
        });
      });
    });
  });

  document.addEventListener('DOMContentLoaded', function() {
    var scrollTopButton = document.getElementById('scrollTopButton');


    window.addEventListener('scroll', function() {
      if (window.scrollY > 100) {
        scrollTopButton.classList.add('show');
      } else {
        scrollTopButton.classList.remove('show');
      }
    });


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
</html>

