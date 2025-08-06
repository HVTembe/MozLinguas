<?php

namespace App\Models\Lessons\Theoretical\Listening;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lessons\Theoretical\Listening\ListeningLesson;

class AudioListeningLesson extends Model
{
    use HasFactory;

     // Disable auto-incrementing primary key
     public $incrementing = false;
    
     // No primary key column
     protected $primaryKey = null;
     
     // Disable timestamps if your table doesn't have them
     public $timestamps = false;
     
     // Specify the table name (optional if following Laravel naming conventions)
     protected $table = 'audio_listening_lessons';
     
     // Fillable fields
     protected $fillable = ['idListeningLesson', 'audio'];

    // Relacionamento com ReadingLesson
    public function readingLesson()
    {
        return $this->belongsTo(ListeningLesson::class, 'idListeningLesson', 'idListeningLesson');
    }

}