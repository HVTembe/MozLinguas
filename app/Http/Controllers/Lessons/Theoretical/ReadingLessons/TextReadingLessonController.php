<?php

namespace App\Http\Controllers\Lessons\Theoretical\ReadingLessons; // Controllers must be in this namespace

use App\Models\Lessons\Theoretical\Reading\TextReadingLesson;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TextReadingLessonController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'idReadingLesson' => 'required|exists:reading_lessons,idReadingLesson',
            'text' => 'required|string',
        ]);

        $lesson = TextReadingLesson::create([
            'idReadingLesson' => $request->idReadingLesson,
            'text' => $request->text,
        ]);

        return response()->json($lesson, 201);
    }

    public function show($idReadingLesson)
    {
        $lessons = TextReadingLesson::where('idReadingLesson', $idReadingLesson)->get();
    
        if ($lessons->isEmpty()) {
            return response()->json(['message' => 'Nenhuma lição encontrada para este código'], 404);
        }
    
        
        return response()->json($lessons, 200);
    }

    public function destroy($idReadingLesson)
    {
        $lesson = TextReadingLesson::where('idReadingLesson', $idReadingLesson);
        if (!$lesson) {
            return response()->json(['message' => 'Lição não encontrada'], 404);
        }

        $lesson->delete();
        return response()->json(['message' => 'Lição removida com sucesso'], 200);
    }

}

