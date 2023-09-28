<?php

return [
    'menus' => [
        [
            'name' => 'Home',
            'url' => '/home',
            'icon' => 'fa-solid fa-house',
        ],
        [
            'name' => 'Clientes',
            'url' => '/lista-clientes',
            'icon' => 'fa-solid fa-users',
        ],
        [
            'name' => 'Vendas',
            'url' => '/vendas',
            'icon' => 'fas fa-gift',
        ],
        [
            'name' => 'Fornecedores',
            'url' => '/lista-forncedores',
            'icon' => 'fa-solid fa-user',
        ],
    ],
    'menusCollapse' => [
        [
            'nome' => 'Produtos',
            'nome_A' => 'Produtos',
            'nome_B' => 'Categorias',
            'url_A' => '/lista-produtos',
            'url_B' => '/lista-categorias',
            'icon' => 'fas fa-shopping-cart',
        ],
        [
            'nome' => 'Estoque',
            'nome_A' => 'Entradas de Produtos',
            'nome_B' => 'Saída de Produtos',
            'url_A' => '/entrada-produtos',
            'url_B' => '/saida-produtos',
            'icon' => 'fa-solid fa-truck-ramp-box',
        ],
        [
            'nome' => 'Consultas',
            'nome_A' => 'Entradas',
            'nome_B' => 'Saídas',
            'url_A' => '/consulta-entrada-produtos',
            'url_B' => '/consulta-saida-produtos',
            'icon' => 'fas fa-chart-line',
        ],
    ],
];
