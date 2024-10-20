<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>