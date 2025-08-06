<?php

namespace App\Http\Controllers\Languages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Languages\Lingua;

class LinguaController extends Controller
{
    // Criar uma nova língua
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|max:5',
            'nome' => 'required|string|max:255|unique:linguas,nome',
            'regiao' => 'required|string|max:255',
            'historia' => 'required|string',
            'nr_falantes' => 'required|integer|min:1',
            
        ]);

        $lingua = Lingua::create([
            'codigo'=> $request->codigo,
            'nome' => $request->nome,
            'data_criacao' => now(),
            'regiao' => $request->regiao,
            'historia' => $request->historia,
            'nr_falantes' => $request->nr_falantes,
            
        ]);

        return response()->json($lingua, 201);
    }

    // Obter uma língua pelo código
    public function show($codigo)
    {
        $lingua = Lingua::find($codigo);
        if (!$lingua) {
            return response()->json(['message' => 'Língua não encontrada'], 404);
        }
        return response()->json($lingua);
    }

    //Obter todas as linguas
    public function showAll(){
        $linguas = Lingua::all();
        if(!$linguas){
            return response()->json(['message'=>'Nenuma linua foi encontrada'], 404);
        }
        return response() -> json($linguas);
    }

    public function delete($codigo){
        // Find the admin by ID and delete
        $lingua=Lingua::find($codigo);
        if(!$lingua){
            return response()->json(['message'=>'Lingua nao encontrado'],404);
        }
        $lingua->delete();
        return response()->json(['message'=>'Lingua deletado com sucesso']);
    }
}
