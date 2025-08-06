<?php

namespace App\Models\Languages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lingua extends Model
{
    use HasFactory;

    protected $table = 'linguas';

    protected $primaryKey = 'codigo';

    public $incrementing = false; // 

    protected $keyType = 'string';

    protected $fillable = [
        'codigo',
        'nome',
        'data_criacao',
        'regiao',
        'historia',
        'nr_falantes',
    ];
}

