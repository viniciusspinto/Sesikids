<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'name',
        'descricao',
        'rating',
        'user_id' // Adicionando user_id para relacionamento
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}