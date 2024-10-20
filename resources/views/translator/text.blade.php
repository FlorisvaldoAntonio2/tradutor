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



    <div class="row mt-5">

        <form action="#" method="POST" id="formTranslation">

            <div class="row mb-1">
                <div class="col-sm-12 col-md-6">
                    <label for="languageFrom" class="form-label">Idioma origem:</label>
            
                    <select name="languageFrom" id="languageFrom" class="form-select">
                        <option value="-1" selected disabled>Selecione o idioma do seu texto</option>
                        @foreach ($languages as $key =>$language)
                        @if ($key == 'pt')
                        <option value="{{$key}}" selected>{{ $language->name }}</option>
                    @else
                        <option value="{{$key}}">{{ $language->name }}</option>
                    @endif
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-12 col-md-6">
                    <label for="languageTo" class="form-label">Idioma tradução:</label>

                    <select name="languageTo" id="languageTo" class="form-select">
                        <option value="-1" selected disabled>Selecione o idioma do seu texto</option>
                        @foreach ($languages as $key =>$language)
                            @if ($key == 'en')
                                <option value="{{$key}}" selected>{{ $language->name }}</option>
                            @else
                                <option value="{{$key}}">{{ $language->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <textarea name="txtfrom" id="txtfrom" cols="30" rows="10" placeholder="Seu texto a ser traduzido!!!" required class="form-control"></textarea>
                </div>
                <div class="col-sm-12 col-md-6">
                    <textarea name="txtTo" id="txtTo" cols="30" rows="10" placeholder="Seu texto traduzido!!!" readonly class="form-control"></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">
                <span class="spinner-grow spinner-grow-sm" aria-hidden="true" hidden></span>
                <span role="andamento" hidden>Traduzindo...</span>
                <span role="pronto">Traduzir!</span>
            </button>

        </form>

    </div>
    
@endsection

<script>
    //espera o documento ser carregado
    document.addEventListener("DOMContentLoaded", function(event) {
        let formTranslation = document.getElementById('formTranslation');

        formTranslation.addEventListener('submit', function(event){
            event.preventDefault();

            toogleSpinner(formTranslation);
        
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
                txtTo.value = data[0].translations[0].text;
                toogleSpinner(formTranslation);
            })
            .catch(error => {
                toogleSpinner(formTranslation);
                console.error('Error:', error);
            });
        });
    })

    function toogleSpinner(button){
        let spinner = button.querySelector('.spinner-grow');
        let statusLoading = button.querySelector('[role="andamento"]');
        let statusReady = button.querySelector('[role="pronto"]');

        spinner.hidden = !spinner.hidden;
        statusLoading.hidden = !statusLoading.hidden;
        statusReady.hidden = !statusReady.hidden;
    }

</script>
