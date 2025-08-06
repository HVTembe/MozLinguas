<?php


namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users\Admin;

class AdminController extends Controller
{
    // Criar um novo admin
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:admins,email',
            'nome' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        $admin = Admin::create([
            'email' => $request->email,
            'nome' => $request->nome,
            'password' => bcrypt($request->password), // Senha criptografada
            'data_inscricao' => now(),
        ]);

        return response()->json($admin, 201);
    }

    // Obter um aluno por email
    public function show($email)
    {
        $admin = Admin::find($email);
        if (!$admin) {
            return response()->json(['message' => 'Admin não encontrado'], 404);
        }
        return response()->json($admin);
    }

    public function showAll(){
        $admin = Admin::all();
        if(!$admin){
            return response()->json(['message'=>'Nenhum admin encontrado '], 404);
        }
        return response()->json($admin);
    }

    public function delete($email){
        // Find the admin by ID and delete
        $admin=Admin::find($email);
        if(!$admin){
            return response()->json(['message'=>'Admin nao encontrado'],404);
        }
        $admin->delete();
        return response()->json(['message'=>'Admin deletado com sucesso']);
    }
}
