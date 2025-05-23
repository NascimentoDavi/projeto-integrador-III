@extends('layouts.app')

@section('title', 'Menu')

@section('content')

    <h2 class="mb-4">Dashboard</h2>

    <p class="h3 mb-4"> Olá {{auth()->user()["completeName"]}}</>

    {{-- Seção Perfil --}}
    <div class="mb-5">
        <h4 class="mb-3">Análises de Perfil</h4>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <img src="{{ asset('images/Analise_Perfil_Fonte_Informacao.png') }}" class="img-fluid rounded shadow-sm" alt="Fonte de Informação">
            </div>
            <div class="col-md-6 col-lg-4">
                <img src="{{ asset('images/Analise_Perfil_Objetivo.png') }}" class="img-fluid rounded shadow-sm" alt="Objetivo">
            </div>
            <div class="col-md-6 col-lg-4">
                <img src="{{ asset('images/Analise_Perfil_Expectativa_Retorno.png') }}" class="img-fluid rounded shadow-sm" alt="Expectativa de Retorno">
            </div>
            <div class="col-md-6 col-lg-4">
                <img src="{{ asset('images/Analise_Perfil_Faixa_Etaria.png') }}" class="img-fluid rounded shadow-sm" alt="Faixa Etária">
            </div>
            <div class="col-md-6 col-lg-4">
                <img src="{{ asset('images/Analise_Perfil_Genero.png') }}" class="img-fluid rounded shadow-sm" alt="Gênero">
            </div>
        </div>
    </div>

    {{-- Seção Startups --}}
    <div class="mb-5">
        <h4 class="mb-3">Análises de Startups</h4>
        <div class="row g-4">

            <div class="col-md-6 col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center">Segmento Surgimento</h5>
                        <img src="{{ asset('images/Analise_Startup_Segmento_Surgimento_Startup.png') }}" class="img-fluid rounded" alt="Segmento Surgimento">
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center">Segmento Quantidade Investidores</h5>
                        <img src="{{ asset('images/Analise_Startup_Segmento_QTD_Investidores.png') }}" class="img-fluid rounded" alt="Segmento Quantidade Investidores">
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center">Maiores Investimentos por País</h5>
                        <img src="{{ asset('images/Analise_Startup_Segmento_Maior_Valor.png') }}" class="img-fluid rounded" alt="Maior Valor por País">
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center">Segmento Crescimento</h5>
                        <img src="{{ asset('images/Analise_Startup_Segmento_Crescimento.png') }}" class="img-fluid rounded" alt="Segmento Crescimento">
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center">País x Valor Investido</h5>
                        <img src="{{ asset('images/Analise_Startup_Pais_Valor_Investido.png') }}" class="img-fluid rounded" alt="País Valor Investido">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
