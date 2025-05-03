<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;

    // Definindo a tabela associada ao model
    protected $table = 'bank_accounts';

    // Definindo os campos que podem ser preenchidos em massa
    protected $fillable = [
        'account_number',
        'bank_name',
        'bank_inst_id',
        'account_type',
        'initial_balance',
        'current_balance',
        'user_id'
    ];

    // Atributos que são do tipo datetime
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    // Relacionamento com a tabela 'banks' (instituições bancárias)
    public function bankInst()
    {
        return $this->belongsTo(BankInst::class, 'bank_inst_id');
    }

    // Relacionamento com a tabela 'users' (usuários)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Definindo que o saldo inicial e o saldo atual são sempre valores positivos
    protected $casts = [
        'initial_balance' => 'decimal:2',
        'current_balance' => 'decimal:2',
    ];

    // Definindo o comportamento de saldo quando um banco de dados for criado
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Definindo um saldo inicial padrão, caso não tenha sido definido
            if (is_null($model->initial_balance)) {
                $model->initial_balance = 0;
            }

            // Definindo saldo atual igual ao inicial quando não for especificado
            if (is_null($model->current_balance)) {
                $model->current_balance = $model->initial_balance;
            }
        });
    }
}
