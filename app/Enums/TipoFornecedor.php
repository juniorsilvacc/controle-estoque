<?php

namespace App\Enums;

enum TipoFornecedor: string
{
    case F = 'Fabricante';
    case D = 'Distribuidor';
    case A = 'Atacadista';

    public static function valueOf(string $nome): string
    {
        foreach (self::cases() as $tipo) {
            if ($nome === $tipo->nome) {
                return $tipo->value;
            }
        }
    }
}
