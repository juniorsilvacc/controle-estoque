<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function getDataEntradaAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }
}
