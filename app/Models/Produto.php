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
}
