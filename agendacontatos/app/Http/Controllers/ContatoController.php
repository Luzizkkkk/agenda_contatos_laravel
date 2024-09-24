<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContatoController extends Controller
{
 
    public function index()
    {
        $contatos = Auth::user()->contatos;
        return view('contatos.index', compact('contatos'));
    }

 
    public function create()
    {
        return view('contatos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'endereco' => 'nullable|string|max:255',
        ]);

        $contato = new Contato();
        $contato->nome = $request->nome;
        $contato->telefone = $request->telefone;
        $contato->email = $request->email;
        $contato->endereco = $request->endereco;
        $contato->user_id = Auth::id();
        $contato->save();

        return redirect()->route('contatos.index')->with('success', 'Contato criado com sucesso!');
    }

    public function show(Contato $contato)
    {
        $this->authorize('view', $contato);
        return view('contatos.show', compact('contato'));
    }

    public function edit(Contato $contato)
    {
        $this->authorize('update', $contato);
        return view('contatos.edit', compact('contato'));
    }

    public function update(Request $request, Contato $contato)
    {
        $this->authorize('update', $contato);

        $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'endereco' => 'nullable|string|max:255',
        ]);

        $contato->update($request->all());

        return redirect()->route('contatos.index')->with('success', 'Contato atualizado com sucesso!');
    }

    public function destroy(Contato $contato)
    {
        $this->authorize('delete', $contato);
        $contato->delete();

        return redirect()->route('contatos.index')->with('success', 'Contato excluído com sucesso!');
    }
}
