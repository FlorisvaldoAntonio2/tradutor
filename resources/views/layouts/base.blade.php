<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
  </head>
  <body>
    <div class="container pt-2">
        <div class="row justify-content-center">
          <div class="col-12">
            <h1 class="text-center text-md-start">Tradutor</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <ul class="nav nav-tabs">
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('translator') ? 'active' : '' }}" aria-current="page" href="{{ route('translator.index') }}">Sobre</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('translator/text') ? 'active' : '' }}" href="{{ route('translator.text') }}">Textos</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link disabled {{ Request::is('translator/ducument') ? 'active' : '' }}" href="{{ route('translator.document') }}">Documentos</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link disabled {{ Request::is('translator/dictionary') ? 'active' : '' }}" href="{{ route('translator.dictionary') }}">Dicionário</a>
              </li>
            </ul>
          </div>
        </div>
        @yield('content')
    </div>
  </body>
</html>