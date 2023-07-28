<?php

// Manga data
$resources['operations']['getManga'] = [
    'httpMethod' => 'GET',
    'responseModel' => 'XML_Resource',
    'parameters' => [
        'manga' => [
            'type' => 'string',
            'location' => 'query'
        ]
    ]
];
