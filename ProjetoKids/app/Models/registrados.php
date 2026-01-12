<?php

namespace App\Models;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class registrados extends Authenticatable
{
    use HasFactory;

    protected $table = 'registrados'; 

    protected $fillable = [
        'first_name',
        'last_name',
        'cpf',
        'date_of_birthday',
        'email',
        'ddd_phone',
        'phone_number',
        'address_street',
        'adress_number',
        'village',
        'city',
        'state',
        'zip_code',
        'country',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
