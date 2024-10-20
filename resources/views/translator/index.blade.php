{{-- usar layuot base --}}
@extends('layouts.base')

{{-- titulo da pagina --}}
@section('title', 'Tradutor')

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
            <h1>Sobre esse projeto:</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed venenatis lacus est, eget mollis urna pharetra quis. Pellentesque placerat a nibh at maximus. Sed fermentum egestas leo vitae viverra. Proin vehicula orci mi, eu tristique mi scelerisque vel. Ut ultricies mi vitae cursus fermentum. Donec quis accumsan metus. Nam consectetur venenatis ultrices. Quisque pretium in dolor ut iaculis.
                
                In euismod sem metus, eget cursus eros pellentesque eu. Proin ultrices est ac lorem hendrerit, a convallis est pulvinar. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque efficitur tortor lectus, a laoreet nulla placerat quis. Nulla sed vehicula sapien. Cras sit amet odio urna. Nulla euismod massa in semper elementum. Nulla tincidunt nisl vel porttitor luctus. Sed ligula lorem, fringilla sed venenatis euismod, ornare sit amet arcu. Mauris fermentum scelerisque lorem ac aliquet. Donec fermentum sit amet dui et condimentum. Quisque fringilla egestas ante vitae tincidunt.
                
                Donec consequat, quam sit amet tincidunt pretium, dolor nisi malesuada nulla, eu volutpat enim ex ac purus. Vestibulum aliquam ac diam non aliquet. Pellentesque erat purus, varius luctus odio quis, consectetur aliquam dolor. Donec lacinia placerat facilisis. Nunc dictum auctor vehicula. In eu pulvinar dui. Donec sed egestas lorem. Mauris vulputate risus non justo blandit laoreet.
                
                Mauris quis ipsum nec diam tempus ultricies. Fusce sit amet mollis velit. Mauris efficitur iaculis arcu, vitae</p>
        </div>
    </div>
    
@endsection
