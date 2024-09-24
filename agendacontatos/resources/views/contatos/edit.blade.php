@extends('layouts.app')

@section('content')
    <h1>Editar Contato</h1>

    <form action="{{ route('contatos.update', $contato) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome:</label>
        <input type="text" name="nome" value="{{ $contato->nome }}" required><br>

        <label>Telefone:</label>
        <input type="text" name="telefone" value="{{ $contato->telefone }}"><br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ $contato->email }}"><br>

        <label>Endereço:</label>
        <input type="text" name="endereco" value="{{ $contato->endereco }}"><br>

        <button type="submit">Atualizar</button>
    </form>
@endsection
