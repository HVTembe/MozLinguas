<?php

namespace App\Http\Controllers\Lessons\Theoretical\ListeningLessons; // Controllers must be in this namespace

use App\Models\Lessons\Theoretical\Listening\AudioListeningLesson;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class AudioListeningLessonController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'idListeningLesson' => 'required|exists:listening_lessons,idListeningLesson',
            'audio' => 'required|string',
        ]);

        $lesson = AudioListeningLesson::create([
            'idListeningLesson' => $request->idListeningLesson,
            'audio' => $request->audio,
        ]);

        return response()->json($lesson, 201);
    }

    public function show($idListeningLesson)
    {
        $lessons = AudioListeningLesson::where('idListeningLesson', $idListeningLesson)->get();
    
        if ($lessons->isEmpty()) {
            return response()->json(['message' => 'Nenhuma lição encontrada para este código'], 404);
        }
    
        
        return response()->json($lessons, 200);
    }

    public function destroy($idListeningLesson)
    {
        $lesson = AudioListeningLesson::where('idListeningLesson', $idListeningLesson);
        if (!$lesson) {
            return response()->json(['message' => 'Lição não encontrada'], 404);
        }

        $lesson->delete();
        return response()->json(['message' => 'Lição removida com sucesso'], 200);
    }

}