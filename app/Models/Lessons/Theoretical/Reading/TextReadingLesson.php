<?php

namespace App\Models\Lessons\Theoretical\Reading;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextReadingLesson extends Model
{
    use HasFactory;

     // Disable auto-incrementing primary key
     public $incrementing = false;
    
     // No primary key column
     protected $primaryKey = null;
     
     // Disable timestamps if your table doesn't have them
     public $timestamps = false;
     
     // Specify the table name (optional if following Laravel naming conventions)
     protected $table = 'text_reading_lessons';
     
     // Fillable fields
     protected $fillable = ['idReadingLesson', 'text'];

    // Relacionamento com ReadingLesson
    public function readingLesson()
    {
        return $this->belongsTo(ReadingLesson::class, 'idReadingLesson', 'idReadingLesson');
    }

}

