<?php

namespace App\Http\Controllers\Lessons\Theoretical\VocabularyLessons; // Controllers must be in this namespace

use App\Models\Lessons\Theoretical\Vocabulary\WordVocabularyLesson;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class WordVocabularyLessonController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'idVocabularyLesson' => 'required|exists:vocabulary_lessons,idVocabularyLesson',
            'word' => 'required|string',
            'meaning' => 'required|string',
        ]);

        $lesson = WordVocabularyLesson::create([
            'idVocabularyLesson' => $request->idVocabularyLesson,
            'word' => $request->word,
            'meaning' => $request->meaning,
        ]);

        return response()->json($lesson, 201);
    }

    public function show($idVocabularyLesson)
    {
        $lessons = WordVocabularyLesson::where('idVocabularyLesson', $idVocabularyLesson)->get();
    
        if ($lessons->isEmpty()) {
            return response()->json(['message' => 'Nenhuma lição encontrada para este código'], 404);
        }
    
        
        return response()->json($lessons, 200);
    }

    public function destroy($idVocabularyLesson)
    {
        $lesson = WordVocabularyLesson::where('idVocabularyLesson', $idVocabularyLesson);
        if (!$lesson) {
            return response()->json(['message' => 'Lição não encontrada'], 404);
        }

        $lesson->delete();
        return response()->json(['message' => 'Lição removida com sucesso'], 200);
    }

}