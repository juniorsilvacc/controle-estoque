<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $table = 'fornecedores';

    protected $fillable = [
        'nome',
        'empresa',
        'email',
        'cnpj',
        'user_id',
        'estado_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function estado()
    {
        return $this->hasOne(Estado::class);
    }

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}
