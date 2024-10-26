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

    <div class="row mt-3">
        <div class="col-12 col-md-8">
            <div class="row">
                <div class="col-12">

                    <h2 class="text-center text-md-start">Sobre esse projeto:</h2>

                    <p>
                    Este projeto foi desenvolvido com o objetivo de aplicar alguns conhecimentos adquiridos ao longo da
                    minha trajetória acadêmica e profissional. Ele consiste em um sistema web robusto, capaz de traduzir
                    palavras, textos e documentos, integrando o serviço Microsoft Azure Translator para garantir
                    traduções precisas e rápidas.
                    </p>
                </div>
            </div>

            <h2 class="text-center text-md-start">Fluxo do projeto:</h2>

            <div class="row justify-content-center">
                <div class="col-10 col-md-8">

                    <img class="img-fluid rounded" src="{{ asset('storage/fluxo-tradutor.jpg') }}"  alt="fluxo-projeto">
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 mt-3 mt-md-none">

            <h4 class="text-center text-md-start">Principais Tecnologias:</h4>

            <ul>
                <li>
                    <div class="row">
                        <div class="col-8">
                            <span>Laravel 10</span>
                        </div>
                        <div class="col-4">
                            <img class="float-end float-md-none" src="{{ asset('storage/icons/icon-laravel.png') }}" height="30px" alt="logo-laravel">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-8">
                            <span>MySQL 8.0</span>
                        </div>
                        <div class="col-4">
                            <img class="float-end float-md-none" src="{{ asset('storage/icons/icon-mysql.png') }}" height="30px" alt="logo-mysql">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-8">
                            <span>Templates Blade (nativo do Laravel)</span>
                        </div>
                        <div class="col-4">
                            <img class="float-end float-md-none" src="{{ asset('storage/icons/icon-laravel.png') }}" height="30px" alt="logo-laravel">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-8">
                            <span>Bootstrap 5.3</span>
                        </div>
                        <div class="col-4">
                            <img class="float-end float-md-none" src="{{ asset('storage/icons/icon-bootstrap.png') }}" height="30px" alt="logo-bootstrap">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-8">
                            <span>Docker</span>
                        </div>
                        <div class="col-4">
                            <img class="float-end float-md-none" src="{{ asset('storage/icons/icon-docker.png') }}" height="30px" alt="logo-docker">
                        </div>
                    </div> 
                </li>
                <li>
                    <div class="row">
                        <div class="col-8">
                            <span>Docker Compose</span>
                        </div>
                        <div class="col-4">
                            <img class="float-end float-md-none" src="{{ asset('storage/icons/icon-docker.png') }}" height="30px" alt="logo-docker">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-8">
                            <span>Git</span>
                        </div>
                        <div class="col-4">
                            <img class="float-end float-md-none" src="{{ asset('storage/icons/icon-git.png') }}" height="30px" alt="logo-git">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-8">
                            <span> GitHub</span>
                        </div>
                        <div class="col-4">
                            <img class="float-end float-md-none" src="{{ asset('storage/icons/icon-github.png') }}" height="30px" alt="logo-github">
                        </div>
                    </div>
                   
                </li>
                <li>
                    <div class="row">
                        <div class="col-8">
                            <span>Microsoft Azure Translator</span>
                        </div>
                        <div class="col-4">
                            <img class="float-end float-md-none" src="{{ asset('storage/icons/icon-azure.png') }}" height="30px" alt="logo-azure">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-8">
                            <span>Vite</span>
                        </div>
                        <div class="col-4">
                            <img class="float-end float-md-none" src="{{ asset('storage/icons/icon-vite.png') }}" height="30px" alt="logo-vite">
                        </div>
                    </div>                    
                </li>
                <li>
                    <div class="row">
                        <div class="col-8">
                            <span>Rest API</span>
                        </div>
                        <div class="col-4">
                            <img class="float-end float-md-none" src="{{ asset('storage/icons/icon-rest-api.png') }}" height="30px" alt="logo-api">
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    
@endsection
