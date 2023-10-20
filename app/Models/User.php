<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome_usuario',
        'primeiro_nome',
        'ultimo_nome',
        'telefone',
        'email',
        'data_nascimento',
        'image',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function setTelefoneAttribute($value)
    {
        $this->attributes['telefone'] =
            str_replace('(', '',
                str_replace(')', '',
                    str_replace(' ', '',
                        str_replace('-', '', $value))));
    }

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }

    public function fornecedores()
    {
        return $this->hasMany(Fornecedor::class);
    }

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}
