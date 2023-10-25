<?php

return [
    'menusManagement' => [
        [
            'name' => 'Clientes',
            'url' => '/lista-clientes',
            'icon' => 'fa-solid fa-users',
        ],
        [
            'name' => 'Fornecedores',
            'url' => '/lista-fornecedores',
            'icon' => 'fa-solid fa-user',
        ],
        [
            'name' => 'Produtos',
            'url' => '/lista-produtos',
            'icon' => 'fas fa-shopping-cart',
        ],
        [
            'name' => 'Categorias',
            'url' => '/lista-categorias',
            'icon' => 'fas fa-boxes',
        ],
    ],
    'menusMovement' => [
        [
            'name' => 'Entrada',
            'url' => '/entrada/produtos',
            'icon' => 'fas fa-arrow-circle-right',
        ],
        [
            'name' => 'Saída',
            'url' => '/saida/produtos',
            'icon' => 'fas fa-arrow-circle-left',
        ],
    ],
    'menusAnalysis' => [
        [
            'name' => 'Consultas',
            'icon' => 'fas fa-chart-line',

            'name_A' => 'Entradas',
            'name_B' => 'Saídas',

            'url_A' => '/consultas/entradas',
            'url_B' => '/consultas/saidas',
        ],
    ],
];
