@extends('layouts.app')

@section('content')
    <h1>Adicionar Contato</h1>

    <form action="{{ route('contatos.store') }}" method="POST">
        @csrf
        <label>Nome:</label>
        <input type="text" name="nome" required><br>

        <label>Telefone:</label>
        <input type="text" name="telefone"><br>

        <label>Email:</label>
        <input type="email" name="email"><br>

        <label>Endereço:</label>
        <input type="text" name="endereco"><br>

        <button type="submit">Salvar</button>
    </form>
@endsection
