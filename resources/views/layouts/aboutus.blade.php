@extends('layouts.layout')

@section('content')
  <x-panel>
    <div class="px-5 py-6 flex">
      <div class="flex-shrink-0 mr-6">
        <img src="./images/logodiskarp2.jpg" alt="me" class="rounded-xl" width="170" height="170">
      </div>

      <div class="flex flex-col justify-between">
        <header>
          <div class="mt-4">
            <h1 class="text-3xl">
              Sobre Nosotros, bueno sobre mí
            </h1>
          </div>
          <div class="mt-4 space-y-4 text-sm">
          <p>
            Voy al grano, no te preocupes ;D
          </p>
          <p>
            Me llamo <strong>José Pablo</strong> aunque mi nombre artístico es <strong>DiskArp</strong>. Siempre he sido un amante de los videojuegos, de la tecnología y claro de las curiosidades y por ello quería realizar este blog.<br> <br> Al llevar desde pequeño entrando en diferentes blogs, siempre he encontrado ciertos problemas: publicidad excesiva, noticias que no van al grano y sobre todo muuuuuucho clickbait. Y por ello he decidido acabar con todo eso, si tienes unos humildes 5 minutos te da tiempo a leerte unas cuantas noticias y volver a lo tuyo.<br> <br> Y bueeeno ¿qué haces aún aquí? ¡Corre que te estás perdiendo las <strong>ÚLTIMAS NOTICIAS</strong>!
          </p>
        </div>
        </header>


      </div>
    </div>
  </x-panel>
@endsection
