<?php

return [
    'default' => 'XOF',  // Définir la devise par défaut sur le FCFA

    'currencies' => [
        'XOF' => [
            'symbol' => 'FCFA',
            'name' => 'Franc CFA',
            'exchange_rate' => 1,  // Ratio par rapport à la devise principale (USD, EUR, etc.)
            'symbol_position' => 'after',  // Position du symbole (avant ou après le montant)
        ],
        'USD' => [
            'symbol' => '$',
            'name' => 'US Dollar',
            'exchange_rate' => 0.0017, // Exemple de taux de conversion XOF -> USD
            'symbol_position' => 'before',
        ],
        'EUR' => [
            'symbol' => '€',
            'name' => 'Euro',
            'exchange_rate' => 0.0015, // Exemple de taux de conversion XOF -> EUR
            'symbol_position' => 'before',
        ],
    ],
];
