{{-- usar layuot base --}}
@extends('layouts.base')

{{-- titulo da pagina --}}
@section('title', 'Tradutor de texto')

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
            <h1>Tradutor de texto</h1>
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

    <form action="#" method="POST" id="formTranslation">

        <label for="languageFrom">Idioma origem:</label>
        
        <select name="languageFrom" id="languageFrom">
            <option value="-1" selected disabled>Selecione o idioma do seu texto</option>
            @foreach ($languages as $key =>$language)
            @if ($key == 'pt')
            <option value="{{$key}}" selected>{{ $language->name }}</option>
        @else
            <option value="{{$key}}">{{ $language->name }}</option>
        @endif
            @endforeach
        </select>

        <textarea name="txtfrom" id="txtfrom" cols="30" rows="10" placeholder="Seu texto a ser traduzido!!!"></textarea>

        <label for="languageTo">Idioma tradução:</label>

        <select name="languageTo" id="languageTo">
            <option value="-1" selected disabled>Selecione o idioma do seu texto</option>
            @foreach ($languages as $key =>$language)
                @if ($key == 'en')
                    <option value="{{$key}}" selected>{{ $language->name }}</option>
                @else
                    <option value="{{$key}}">{{ $language->name }}</option>
                @endif
            @endforeach
        </select>

        <textarea name="txtTo" id="txtTo" cols="30" rows="10" placeholder="Seu texto traduzido!!!"></textarea>

        <button type="submit">Traduzir</button>

    </form>
    
@endsection

<script>
    //espera o documento ser carregado
    document.addEventListener("DOMContentLoaded", function(event) {
        let formTranslation = document.getElementById('formTranslation');

        formTranslation.addEventListener('submit', function(event){
            event.preventDefault();
        
            let url = "{{ env('AZURE_URL') }}";
            const clientSecret = "{{ env('AZURE_CLIENT_SECRET') }}";
            const region = "{{ env('AZURE_REGION') }}";
            let languageFrom = document.getElementById('languageFrom').value;
            let languageTo = document.getElementById('languageTo').value;
            let txtfrom = document.getElementById('txtfrom').value;
            let txtTo = document.getElementById('txtTo'); //elemento

            url += '/translate?api-version=3.0&from=' + languageFrom + '&to=' + languageTo;
            console.log(url);
            console.log(clientSecret);
            //cria um objeto data
            let data =
            [
                {"Text": txtfrom}
            ];

            //faz uma requisição fetch
            fetch(url, {
                method: 'POST',
                headers: {
                    'accept': 'application/json',
                    'Ocp-Apim-Subscription-Key': clientSecret,
                    'Ocp-Apim-Subscription-Region': region,
                    'Content-Type': 'application/json; charset=UTF-8'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                console.log(data[0].translations[0].text);
                txtTo.value = data[0].translations[0].text;
            })
            .catch(error => console.error('Error:', error));
        });
    })

</script>
