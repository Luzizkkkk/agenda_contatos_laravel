@extends('layouts.app')

@section('content')
    <h1>Meus Contatos</h1>
    <a href="{{ route('contatos.create') }}">Adicionar Novo Contato</a>

    @if ($contatos->isEmpty())
        <p>Nenhum contato encontrado.</p>
    @else
        <ul>
            @foreach ($contatos as $contato)
                <li>
                    <a href="{{ route('contatos.show', $contato) }}">{{ $contato->nome }}</a> -
                    <a href="{{ route('contatos.edit', $contato) }}">Editar</a>
                    <form action="{{ route('contatos.destroy', $contato) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
