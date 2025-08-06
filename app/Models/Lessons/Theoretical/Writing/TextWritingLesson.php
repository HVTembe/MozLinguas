<?php

namespace App\Models\Lessons\Theoretical\Writing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextWritingLesson extends Model
{
    use HasFactory;

     // Disable auto-incrementing primary key
     public $incrementing = false;
    
     // No primary key column
     protected $primaryKey = null;
     
     // Disable timestamps if your table doesn't have them
     public $timestamps = false;
     
     // Specify the table name (optional if following Laravel naming conventions)
     protected $table = 'text_writing_lessons';
     
     // Fillable fields
     protected $fillable = ['idWritingLesson', 'text'];

    // Relacionamento com WritingLesson
    public function writingLesson()
    {
        return $this->belongsTo(WritingLesson::class, 'idWritingLesson', 'idWritingLesson');
    }

}

