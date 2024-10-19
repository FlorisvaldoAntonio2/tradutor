{{-- usar layuot base --}}
@extends('layouts.base')

{{-- titulo da pagina --}}
@section('title', 'Tradutor de documentos')

{{-- conteudo da pagina --}}
@section('content')

    @if(session('message'))
        @includeIf('partials.alert', ['message' => session('message'), 'type' => session('type')])
    @endif

    @if ($errors->any())
        @include('partials.errors')
    @endif

    <div class="row">
        <div class="col-12">
            <h1>Tradutor de documentos</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h1>Sobre esse projeto:</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed venenatis lacus est, eget mollis urna pharetra quis. Pellentesque placerat a nibh at maximus. Sed fermentum egestas leo vitae viverra. Proin vehicula orci mi, eu tristique mi scelerisque vel. Ut ultricies mi vitae cursus fermentum. Donec quis accumsan metus. Nam consectetur venenatis ultrices. Quisque pretium in dolor ut iaculis.
                t. Mauris efficitur iaculis arcu, vitae
            </p>
        </div>
    </div>
    
@endsection
