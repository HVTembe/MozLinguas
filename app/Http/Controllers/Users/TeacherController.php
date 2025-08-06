<?php


namespace App\Http\Controllers\Users;

use App\Models\Users\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class TeacherController extends Controller
{
    // Criar um novo aluno
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:teachers,email',
            'nome' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        $teacher = Teacher::create([
            'email' => $request->email,
            'nome' => $request->nome,
            'password' => bcrypt($request->password), // Senha criptografada
            'data_inscricao' => now(),
        ]);

        return response()->json($teacher, 201);
    }

    // Obter um aluno por email
    public function show($email)
    {
        $teacher = Teacher::find($email);
        if (!$teacher) {
            return response()->json(['message' => 'Teacher não encontrado'], 404);
        }
        return response()->json($teacher, 200);
    }

    //Obter todos os teachers
    public function showAll(){
        $teachers=Teacher::all();
        if(!$teachers){
            return response()->json(['message' => 'Nenhum teacher foi encontrado'],404);
        }
        return response()->json($teachers);
    }

    public function delete($email){
        // Find the admin by ID and delete
        $teacher=Teacher::find($email);
        if(!$teacher){
            return response()->json(['message'=>'Teacher nao encontrado'],404);
        }
        $teacher->delete();
        return response()->json(['message'=>'Teacher deletado com sucesso']);
    }
}