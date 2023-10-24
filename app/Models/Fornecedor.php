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
        'telefone',
        'endereco',
        'cnpj',
        'tipo',
        'observacoes',
        'user_id',
    ];

    public function setTelefoneAttribute($value)
    {
        $this->attributes['telefone'] =
            str_replace('(', '',
                str_replace(')', '',
                    str_replace(' ', '',
                        str_replace('-', '', $value))));
    }

    public function setCnpjAttribute($value)
    {
        $this->attributes['cnpj'] =
            str_replace('.', '',
                str_replace('/', '',
                    str_replace('-', '', $value)));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }

    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }
}
