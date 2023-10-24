<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    protected $table = 'entradas';

    protected $fillable = [
        'quantidade',
        'data_entrada',
        'observacoes',
        'produto_id',
        'fornecedor_id',
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }
}
