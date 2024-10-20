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
    <div class="container">
        <div class="row">
          <div class="col-12">
            <h1>Tradutor</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <ul class="nav nav-tabs">
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('translator') ? 'active' : '' }}" aria-current="page" href="{{ route('translator.index') }}">Sobre</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('translator/text') ? 'active' : '' }}" href="{{ route('translator.text') }}">Traduzir textos</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link disabled {{ Request::is('translator/ducument') ? 'active' : '' }}" href="{{ route('translator.document') }}">Traduzir documentos</a>
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