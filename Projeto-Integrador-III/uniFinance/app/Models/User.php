<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Campos preenchidos em massa
    protected $fillable = [
        'completeName',
        'email',
        'password',
        'profile_photo',
    ];

    // Campos ocultos ao serializar (ex: para API)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Cast para campos específicos
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Um usuario pode ter varias contas bancarias
    public function bankAccounts()
    {
        return $this->hasMany(BankAccount::class);
    }
}
