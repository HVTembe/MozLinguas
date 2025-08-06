<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $table = 'alunos'; // Nome da tabela no banco de dados

    protected $primaryKey = 'email'; // Chave primária personalizada

    public $incrementing = false; // Indica que a chave primária não é autoincrementável

    protected $keyType = 'string'; // Tipo da chave primária

    protected $fillable = [
        'email',
        'nome',
        'password',
        'data_inscricao',
    ];

    protected $hidden = [
        'password',
    ];



    // Relacionamentos
 
}
