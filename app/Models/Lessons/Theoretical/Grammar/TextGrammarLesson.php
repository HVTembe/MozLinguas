<?php

namespace App\Models\Lessons\Theoretical\Grammar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextGrammarLesson extends Model
{
    use HasFactory;

     // Disable auto-incrementing primary key
     public $incrementing = false;
    
     // No primary key column
     protected $primaryKey = null;
     
     // Disable timestamps if your table doesn't have them
     public $timestamps = false;
     
     // Specify the table name (optional if following Laravel naming conventions)
     protected $table = 'text_grammar_lessons';
     
     // Fillable fields
     protected $fillable = ['idGrammarLesson', 'text'];

    // Relacionamento com ReadingLesson
    public function grammarLesson()
    {
        return $this->belongsTo(GrammarLesson::class, 'idGrammarLesson', 'idGrammarLesson');
    }

}

