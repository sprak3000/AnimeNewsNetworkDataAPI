<?php
// Anime data
$resources['operations']['getAnime'] = [
  'httpMethod' => 'GET',
  'responseModel' => 'XML_Resource',
  'parameters' => [
    'anime' => [
      'type' => 'string',
      'location' => 'query'
    ]
  ]
];