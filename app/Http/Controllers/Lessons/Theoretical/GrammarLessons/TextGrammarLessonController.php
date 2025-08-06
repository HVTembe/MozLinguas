<?php
namespace App\Http\Controllers\Lessons\Theoretical\GrammarLessons;

use Illuminate\Http\Request;
use App\Models\Lessons\Theoretical\Grammar\TextGrammarLesson;
use App\Http\Controllers\Controller;

class TextGrammarLessonController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'idGrammarLesson' => 'required|exists:grammar_lessons,idGrammarLesson',
            'text' => 'required|string',
        ]);

        $lesson = TextGrammarLesson::create([
            'idGrammarLesson' => $request->idGrammarLesson,
            'text' => $request->text,
        ]);

        return response()->json($lesson, 201);
    }

    public function show($idGrammarLesson)
    {
        $lessons = TextGrammarLesson::where('idGrammarLesson', $idGrammarLesson)->get();
    
        if ($lessons->isEmpty()) {
            return response()->json(['message' => 'Nenhuma lição encontrada para este código'], 404);
        }
    
        
        return response()->json($lessons, 200);
    }

    public function destroy($idGrammarLesson)
    {
        $lesson = TextGrammarLesson::where('idGrammarLesson', $idGrammarLesson);
        if (!$lesson) {
            return response()->json(['message' => 'Lição não encontrada'], 404);
        }

        $lesson->delete();
        return response()->json(['message' => 'Lição removida com sucesso'], 200);
    }

}


