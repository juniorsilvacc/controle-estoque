<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saida extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantidade',
        'data_saida',
        'observacoes',
        'produto_id',
        'cliente_id',
    ];

    public function getDataSaidaAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
