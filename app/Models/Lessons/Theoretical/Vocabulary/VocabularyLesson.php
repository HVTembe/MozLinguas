<?php

namespace App\Models\Lessons\Theoretical\Vocabulary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users\Teacher;
use App\Models\Languages\Lingua;

class VocabularyLesson extends Model
{
    use HasFactory;

    protected $table = 'vocabulary_lessons';

    protected $primaryKey = 'idVocabularyLesson';

    public $incrementing = true; // ID autoincrementável

    protected $keyType = 'int';

    protected $fillable = [
        'codigoLingua',
        'titulo',
        'dataCriacao',
        'emailTeacher',
    ];

    // Relacionamento com Língua
    public function lingua()
    {
        return $this->belongsTo(Lingua::class, 'codigoLingua', 'codigo');
    }

    // Relacionamento com Teacher
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'emailTeacher', 'email');
    }
}


