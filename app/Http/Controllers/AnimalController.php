<?php

namespace App\Http\Controllers;
use App\Models\Animal;
use Illuminate\Http\Request;
use App\Http\Requests\AnimalRequest;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{


    public function index()
    {
        $animais = Animal::latest()->paginate(10);
        return view('animais.index', compact('animais'));

    }


    public function create()
    {
      return view('animais.create');
    }

public function store(AnimalRequest $request)
{
    $dados = $request->validated();

    if ($request->hasFile('foto')) {
        $dados['foto'] = $request->file('foto')->store('animais', 'public');
    }

    Animal::create($dados);

    return redirect()->route('animais.index')->with('success', 'Animal cadastrado com sucesso!');
}


    public function show(Animal $animal)
    {
        return view('animais.show', compact('animal'));
    }


    public function edit(Animal $animal)
    {
        return view('animais.edit', compact('animal'));
    }


  public function update(AnimalRequest $request, Animal $animal)
{
    $dados = $request->validate([
        'nome'      => 'required|string|max:250',
        'especie'   => 'required|string|max:100',
        'raca'      => 'nullable|string|max:100',
        'idade'     => 'nullable|integer|min:0',
        'foto'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'descricao' => 'nullable|string',
    ]);


    if ($request->input('remover_foto')) {
        if ($animal->foto) {
            Storage::disk('public')->delete($animal->foto);
        }
        $dados['foto'] = null;
    }


    if ($request->hasFile('foto')) {
        if ($animal->foto) {
            Storage::disk('public')->delete($animal->foto);
        }
        $dados['foto'] = $request->file('foto')->store('animais', 'public');
    }

    $animal->update($dados);

    return redirect()->route('animais.index')->with('success', 'Animal atualizado com sucesso!');
}

    public function destroy(Animal $animal)
    {
        if ($animal->foto) {
            Storage::disk('public')->delete($animal->foto);
        }
        $animal->delete();

        return redirect()->route('animais.index')->with('success','Animal removido com sucesso!');
    }
}
