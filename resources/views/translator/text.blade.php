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
            @csrf
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
                    <textarea name="txtfrom" id="txtfrom" cols="30" rows="8" placeholder="Seu texto a ser traduzido!!!" required class="form-control"></textarea>
                </div>
                <div class="col-sm-12 col-md-6">
                    <textarea name="txtTo" id="txtTo" cols="30" rows="8" placeholder="Seu texto traduzido!!!" readonly class="form-control"></textarea>
                </div>
            </div>

            <div class="row justify-content-between">
                <div class="col-3 col-md-6 mt-3">
                    <button type="submit" class="btn btn-primary">
                        <span class="spinner-grow spinner-grow-sm" aria-hidden="true" hidden></span>
                        <span role="andamento" hidden>Traduzindo...</span>
                        <span role="pronto">Traduzir! <i class="bi bi-translate"></i></span>
                    </button>
                </div>
                <div class="col-3 col-md-6 mt-3">
                    <button class="btn btn-primary float-end" type="button" aria-controls="offcanvasRight" id="btnHistorical">Histórico <i class="bi bi-clock-history"></i></button> 
                </div>   
            </div>

        </form>

    </div>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="historical" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h4  id="offcanvasRightLabel">Histórico</h4>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            {{-- Histórico --}}
        </div>
    </div>
    
    @vite(['resources/js/translator/text.js'])
    @vite('resources/js/historical/historical.js')
@endsection