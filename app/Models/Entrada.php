<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantidade',
        'preco_unitario',
        'data_entrada',
        'observacoes',
        'produto_id',
        'fornecedor_id',
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
