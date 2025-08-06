<?php

namespace App\Models\Lessons\Theoretical\Vocabulary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lessons\Theoretical\Vocabulary\VocabularyLesson;

class WordVocabularyLesson extends Model
{
    use HasFactory;

     // Disable auto-incrementing primary key
     public $incrementing = false;
    
     // No primary key column
     protected $primaryKey = null;
     
     // Disable timestamps if your table doesn't have them
     public $timestamps = false;
     
     // Specify the table name (optional if following Laravel naming conventions)
     protected $table = 'word_vocabulary_lessons';
     
     // Fillable fields
     protected $fillable = ['idVocabularyLesson', 'word', 'meaning'];

    // Relacionamento com ReadingLesson
    public function readingLesson()
    {
        return $this->belongsTo(VocabularyLesson::class, 'idVocabularyLesson', 'idVocabularyLesson');
    }

}