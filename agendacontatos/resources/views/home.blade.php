@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <p>Bem-vindo, {{ Auth::user()->name }}! Você está logado.</p>

        <!-- botoes das funcionalidadess -->
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('contatos.index') }}" class="btn btn-primary btn-block">
                    Ver Contatos
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('contatos.create') }}" class="btn btn-success btn-block">
                    Adicionar Novo Contato
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('password.request') }}" class="btn btn-warning btn-block">
                    Redefinir Senha
                </a>
            </div>
        </div>
    </div>
@endsection
