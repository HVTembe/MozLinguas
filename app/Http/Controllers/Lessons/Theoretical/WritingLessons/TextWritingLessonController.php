<?php

namespace App\Http\Controllers\Lessons\Theoretical\WritingLessons; // Controllers must be in this namespace

use App\Models\Lessons\Theoretical\Writing\TextWritingLesson;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TextWritingLessonController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'idWritingLesson' => 'required|exists:writing_lessons,idWritingLesson',
            'text' => 'required|string',
        ]);

        $lesson = TextWritingLesson::create([
            'idWritingLesson' => $request->idWritingLesson,
            'text' => $request->text,
        ]);

        return response()->json($lesson, 201);
    }

    public function show($idWritingLesson)
    {
        $lessons = TextWritingLesson::where('idWritingLesson', $idWritingLesson)->get();
    
        if ($lessons->isEmpty()) {
            return response()->json(['message' => 'Nenhuma lição encontrada para este código'], 404);
        }
    
        
        return response()->json($lessons, 200);
    }

    public function destroy($idWritingLesson)
    {
        $lesson = TextWritingLesson::where('idWritingLesson', $idWritingLesson);
        if (!$lesson) {
            return response()->json(['message' => 'Lição não encontrada'], 404);
        }

        $lesson->delete();
        return response()->json(['message' => 'Lição removida com sucesso'], 200);
    }

}
