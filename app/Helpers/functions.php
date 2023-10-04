<?php

// Convertendo o array para um objeto genérico, stdClass
if (!function_exists('convertArrayToObject')) {
    function convertItemsOfArrayToObject(array $item): array
    {
        $items = array_map(function ($data) {
            $stdClass = new \stdClass();
            foreach ($data as $key => $value) {
                $stdClass->{$key} = $value;
            }

            return $stdClass;
        }, $item);

        return $items;
    }
}

if (!function_exists('validarCNPJ')) {
    function validarCNPJ(string $cnpj)
    {
        // Remova caracteres não numéricos
        $cnpj = preg_replace('/\D/', '', $cnpj);

        // Verifique o tamanho do CNPJ
        if (strlen($cnpj) != 14) {
            return false;
        }

        // Verifique se todos os dígitos são iguais
        if (preg_match('/^(\d)\1*$/', $cnpj)) {
            return false;
        }

        // Verifique os dígitos verificadores
        $tamanho = strlen($cnpj) - 2;
        $cnpjParcial = substr($cnpj, 0, $tamanho);
        $digitoVerificador = substr($cnpj, $tamanho);

        $soma = 0;
        $pos = $tamanho - 7;

        for ($i = $tamanho; $i >= 1; --$i) {
            $soma += $cnpjParcial[$tamanho - $i] * $pos--;
            if ($pos < 2) {
                $pos = 9;
            }
        }

        $resultado = $soma % 11 < 2 ? 0 : 11 - ($soma % 11);

        if ($resultado != $digitoVerificador[0]) {
            return false;
        }

        ++$tamanho;
        $cnpjParcial = substr($cnpj, 0, $tamanho);
        $soma = 0;
        $pos = $tamanho - 7;

        for ($i = $tamanho; $i >= 1; --$i) {
            $soma += $cnpjParcial[$tamanho - $i] * $pos--;
            if ($pos < 2) {
                $pos = 9;
            }
        }

        $resultado = $soma % 11 < 2 ? 0 : 11 - ($soma % 11);

        if ($resultado != $digitoVerificador[1]) {
            return false;
        }

        return true;
    }
}
