<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    // Criar uma nova lição (apenas professores)
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'teacher') {
            return response()->json(['error' => 'Apenas professores podem criar lições.'], 403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $lesson = Lesson::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return response()->json($lesson, 201);
    }

    // Listar todas as lições
    public function index()
    {
        $lessons = Lesson::with('teacher')->get();
        return response()->json($lessons);
    }

    // Visualizar uma única lição
    public function show($id)
    {
        $lesson = Lesson::with('teacher')->find($id);
        if (!$lesson) {
            return response()->json(['error' => 'Lição não encontrada.'], 404);
        }
        return response()->json($lesson);
    }
}

