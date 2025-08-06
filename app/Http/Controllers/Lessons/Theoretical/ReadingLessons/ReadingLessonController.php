<?php

namespace App\Http\Controllers\Lessons\Theoretical\ReadingLessons; // Controllers must be in this namespace

use App\Models\Lessons\Theoretical\Reading\ReadingLesson;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReadingLessonController extends Controller
{
    /**
     * Exibir todas as lições de escrita.
     */
    public function index()
    {
        return response()->json(ReadingLesson::all(), 200);
    }

    /**
     * Criar uma nova lição de escrita.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigoLingua' => 'required|exists:linguas,codigo',
            'titulo' => 'required|string|max:255',
            'emailTeacher' => 'required|exists:teachers,email',
        ]);

        $lesson = ReadingLesson::create([
            'codigoLingua' => $request->codigoLingua,
            'titulo' => $request->titulo,
            'emailTeacher' => $request->emailTeacher,
            'dataCriacao' => now(),
        ]);

        return response()->json($lesson, 201);
    }

    /**
     * Exibir uma lição específica.
     */
    public function show($id)
    {
        $lesson = ReadingLesson::find($id);
        if (!$lesson) {
            return response()->json(['message' => 'Lição não encontrada'], 404);
        }
        return response()->json($lesson, 200);
    }

    /**
     * Exibir uma lição específica.
     */
    public function showTeacher($emailTeacher)
    {
        $lessons = ReadingLesson::where('emailTeacher', $emailTeacher)->get();
    
        if ($lessons->isEmpty()) {
            return response()->json(['message' => 'Nenhuma lição encontrada para este código'], 404);
        }
    
        
        return response()->json($lessons, 200);
    }

    /**
     * Exibir uma lição específica.
     */
    public function showLingua($codigoLingua)
    {
        $lessons = ReadingLesson::where('codigoLingua', $codigoLingua)->get();
    
        if ($lessons->isEmpty()) {
            return response()->json(['message' => 'Nenhuma lição encontrada para este código'], 404);
        }
    
        
        return response()->json($lessons, 200);
    }
    /**
     * Atualizar uma lição específica.
     */
    public function update(Request $request, $id)
    {
        $lesson = ReadingLesson::find($id);
        if (!$lesson) {
            return response()->json(['message' => 'Lição não encontrada'], 404);
        }

        $request->validate([
            'codigoLingua' => 'sometimes|exists:linguas,codigoLingua',
            'titulo' => 'sometimes|string|max:255',
            'emailTeacher' => 'sometimes|exists:teachers,emailTeacher',
        ]);

        $lesson->update($request->all());

        return response()->json($lesson, 200);
    }

    /**
     * Deletar uma lição.
     */
    public function destroy($id)
    {
        $lesson = ReadingLesson::find($id);
        if (!$lesson) {
            return response()->json(['message' => 'Lição não encontrada'], 404);
        }

        $lesson->delete();
        return response()->json(['message' => 'Lição removida com sucesso'], 200);
    }
}
