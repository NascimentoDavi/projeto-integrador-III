<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankInst extends Model
{
    use HasFactory;

    // Definindo a tabela associada ao model
    protected $table = 'bank_inst';

    // Pode ser preenchido em massa
    protected $fillable = [
        'name',
        'code',
        'imagem_path',
    ];

    // Atributos que são do tipo datetime
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
