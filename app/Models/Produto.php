<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'preco',
        'preco_venda',
        'estoque_inicial',
        'estoque_minimo',
        'data_produto',
        'fornecedor_id',
        'categoria_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }

    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }

    public function saidas()
    {
        return $this->hasMany(Saida::class);
    }

    public function vendas()
    {
        return $this->hasMany(Venda::class);
    }
}
