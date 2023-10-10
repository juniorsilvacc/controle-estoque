<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cod_referencia',
        'descricao',
        'unidade_medida',
        'preco_unitario',
        'preco_venda',
        'estoque',
        'image',
        'data_fabricacao',
        'data_validade',
        'fornecedor_id',
        'categoria_id',
        'user_id',
    ];

    public function setPrecoUnitarioAttribute($value)
    {
        $this->attributes['preco_unitario'] = str_replace(',', '.', str_replace('.', '', str_replace('R$', '', $value)));
    }

    public function setPrecoVendaAttribute($value)
    {
        $this->attributes['preco_venda'] = str_replace(',', '.', str_replace('.', '', str_replace('R$', '', $value)));
    }

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
}
