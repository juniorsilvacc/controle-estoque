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
