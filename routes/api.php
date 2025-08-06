<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Lessons\Theoretical\WritingLessons\WritingLessonController;
use App\Http\Controllers\Lessons\Theoretical\WritingLessons\TextWritingLessonController;

use App\Http\Controllers\Lessons\Theoretical\VocabularyLessons\VocabularyLessonController;
use App\Http\Controllers\Lessons\Theoretical\VocabularyLessons\WordVocabularyLessonController;

use App\Http\Controllers\Lessons\Theoretical\ReadingLessons\ReadingLessonController;
use App\Http\Controllers\Lessons\Theoretical\ReadingLessons\TextReadingLessonController;

use App\Http\Controllers\Lessons\Theoretical\ListeningLessons\ListeningLessonController;
use App\Http\Controllers\Lessons\Theoretical\ListeningLessons\AudioListeningLessonController;

use App\Http\Controllers\Lessons\Theoretical\GrammarLessons\GrammarLessonController;
use App\Http\Controllers\Lessons\Theoretical\GrammarLessons\TextGrammarLessonController;


use App\Http\Controllers\Users\AlunoController;
use App\Http\Controllers\Users\TeacherController;
use App\Http\Controllers\Users\AdminController;
use App\Http\Controllers\Languages\LinguaController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Rotas para alunos
Route::post('/alunos', [AlunoController::class, 'store']);
Route::get('/alunos', [AlunoController::class, 'showAll']);
Route::get('/alunos/{email}', [AlunoController::class, 'show']);
Route::delete('/alunos/{email}', [AlunoController::class, 'delete']);

// Rotas para teachers
Route::post('/teacher', [TeacherController::class, 'store']);
Route::get('/teacher', [TeacherController::class, 'showAll']);
Route::get('/teacher/{email}', [TeacherController::class, 'show']);
Route::delete('/teacher/{email}', [TeacherController::class, 'delete']);

// Rotas para admins
Route::post('/admin', [AdminController::class, 'store']);
Route::get('/admin', [AdminController::class, 'showAll']);
Route::get('/admin/{email}', [AdminController::class, 'show']);
Route::delete('/admin/{email}', [AdminController::class, 'delete']);

// Rotas para línguas
Route::post('/linguas', [LinguaController::class, 'store']);
Route::get('/linguas', [LinguaController::class, 'showAll']);
Route::get('/linguas/{codigo}', [LinguaController::class, 'show']);
Route::delete('/linguas/{codigo}', [LinguaController::class, 'delete']);

//Rotas para WritingLesson

Route::post('/writinglesson',[WritingLessonController::class,'store']);

Route::get('/writinglessons',[WritingLessonController::class,'index']);
Route::get('/writinglessonId/{idWritingLesson}',[WritingLessonController::class,'show']);
Route::get('/writinglessonTeacher/{emailTeacher}',[WritingLessonController::class,'showTeacher']);
Route::get('/writinglessonLingua/{codigoLingua}',[WritingLessonController::class,'showLingua']);

Route::put('/writinglesson/{idWritingLesson}',[WritingLessonController::class,'update']);

Route::delete('/writinglesson/{idWritingLesson}',[WritingLessonController::class,'destroy']);

//Rotas para TextWritingLesson

Route::post('/textwritinglesson',[TextWritingLessonController::class,'store']);
Route::get('/textwritinglesson/{idWritingLesson}',[TextWritingLessonController::class,'show']);
Route::delete('/textwritinglesson/{idWritingLesson}',[TextWritingLessonController::class,'destroy']);


//Rotas para ReadingLesson

Route::post('/readinglesson',[ReadingLessonController::class,'store']);

Route::get('/readinglessons',[ReadingLessonController::class,'index']);
Route::get('/readinglessonId/{idWritingLesson}',[ReadingLessonController::class,'show']);
Route::get('/readinglessonTeacher/{emailTeacher}',[ReadingLessonController::class,'showTeacher']);
Route::get('/readinglessonLingua/{codigoLingua}',[ReadingLessonController::class,'showLingua']);

Route::put('/readinglesson/{idReadingLesson}',[ReadingLessonController::class,'update']);

Route::delete('/readinglesson/{idReadingLesson}',[ReadingLessonController::class,'destroy']);

//Rotas para TextReadingLesson

Route::post('/textreadinglesson',[TextReadingLessonController::class,'store']);
Route::get('/textreadinglesson/{idReadingLesson}',[TextReadingLessonController::class,'show']);
Route::delete('/textreadinglesson/{idReadingLesson}',[TextReadingLessonController::class,'destroy']);

//Rotas para ListeningLesson

Route::post('/listeninglesson',[ListeningLessonController::class,'store']);

Route::get('/listeninglessons',[ListeningLessonController::class,'index']);
Route::get('/listeninglessonId/{idWritingLesson}',[ListeningLessonController::class,'show']);
Route::get('/listeninglessonTeacher/{emailTeacher}',[ListeningLessonController::class,'showTeacher']);
Route::get('/listeninglessonLingua/{codigoLingua}',[ListeningLessonController::class,'showLingua']);

Route::put('/listeninglesson/{idListeningLesson}',[ListeningLessonController::class,'update']);

Route::delete('/listeninglesson/{idListeningLesson}',[ListeningLessonController::class,'destroy']);

//Rotas para WordVocabularyLesson

Route::post('/audiolisteninglesson',[AudioListeningLessonController::class,'store']);
Route::get('/audiolisteninglesson/{idListeningLesson}',[AudioListeningLessonController::class,'show']);
Route::delete('/audiolisteninglesson/{idListeningLesson}',[AudioListeningLessonController::class,'destroy']);

//Rotas para VocabularyLesson

Route::post('/vocabularylesson',[VocabularyLessonController::class,'store']);

Route::get('/vocabularylessons',[VocabularyLessonController::class,'index']);
Route::get('/vocabularylessonId/{idVocabularyLesson}',[VocabularyLessonController::class,'show']);
Route::get('/vocabularylessonTeacher/{emailTeacher}',[VocabularyLessonController::class,'showTeacher']);
Route::get('/vocabularylessonLingua/{codigoLingua}',[VocabularyLessonController::class,'showLingua']);

Route::put('/vocabularylesson/{idVocabularyLesson}',[VocabularyLessonController::class,'update']);

Route::delete('/vocabularylesson/{idVocabularyLesson}',[VocabularyLessonController::class,'destroy']);

//Rotas para WordVocabularyLesson

Route::post('/wordvocabularylesson',[WordVocabularyLessonController::class,'store']);
Route::get('/wordvocabularylesson/{idVocabularyLesson}',[WordVocabularyLessonController::class,'show']);
Route::delete('/wordvocabularylesson/{idVocabularyLesson}',[WordVocabularyLessonController::class,'destroy']);

//Rotas para GrammarLesson

Route::post('/grammarlesson',[GrammarLessonController::class,'store']);

Route::get('/grammarlessons',[GrammarLessonController::class,'index']);
Route::get('/grammarlessonId/{idGrammarLesson}',[GrammarLessonController::class,'show']);
Route::get('/grammarlessonTeacher/{emailTeacher}',[GrammarLessonController::class,'showTeacher']);
Route::get('/grammarlessonLingua/{codigoLingua}',[GrammarLessonController::class,'showLingua']);

Route::put('/grammarlesson/{idGrammarLesson}',[GrammarLessonController::class,'update']);

Route::delete('/grammarlesson/{idGrammarLesson}',[GrammarLessonController::class,'destroy']);

//Rotas para TextGrammarLesson

Route::post('/textgrammarlesson',[TextGrammarLessonController::class,'store']);
Route::get('/textgrammarlesson/{idGrammarLesson}',[TextGrammarLessonController::class,'show']);
Route::delete('/textgrammarlesson/{idGrammarLesson}',[TextGrammarLessonController::class,'destroy']);