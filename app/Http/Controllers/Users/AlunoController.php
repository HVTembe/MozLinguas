<?php


namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users\Aluno;

class AlunoController extends Controller
{
    // Criar um novo aluno
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:alunos,email',
            'nome' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        $aluno = Aluno::create([
            'email' => $request->email,
            'nome' => $request->nome,
            'password' => bcrypt($request->password), // Senha criptografada
            'data_inscricao' => now(),
        ]);

        return response()->json($aluno, 201);
    }

    // Obter um aluno por email
    public function show($email)
    {
        $aluno = Aluno::find($email);
        if (!$aluno) {
            return response()->json(['message' => 'Aluno não encontrado'], 404);
        }
        return response()->json($aluno);
    }

    //Obter todos os alunos
    public function showAll(){
        $alunos=Aluno::all();
        if(!$alunos){
            return response()->json(['message'=>'Nenhum aluno foi encontrado na base de dados'], 404);
        }
        return response()->json($alunos);
    }

    public function delete($email){
        // Find the admin by ID and delete
        $aluno=Aluno::find($email);
        if(!$aluno){
            return response()->json(['message'=>'Aluno nao encontrado'],404);
        }
        $aluno->delete();
        return response()->json(['message'=>'Aluno deletado com sucesso']);
    }
}
