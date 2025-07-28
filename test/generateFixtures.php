#!/usr/bin/env php
<?php

use sprak3000\AnimeNewsNetworkDataAPI\Test\DebugClient;

require 'bootstrap.php';

$animeIds = [
    '16148',
    '15561',
    '15319',
    '15284',
    '14828',
    '14135',
    '13693',
    '11231',
    '10605',
    '10076',
    '8997',
    '8868',
    '8335',
    '6837',
    '5560',
    '4195',
    '3053',
    '2727',
    '2657',
    '2101',
    '2100',
    '2099',
    '2098',
    '2097',
    '2096',
    '2094',
    '2093',
    '2092',
    '2091',
    '2090',
    '2089',
    '2063',
    '2023',
    '2022',
    '1040',
    '1039',
    '887',
    '886',
    '885',
    '642',
    '641',
    '367',
    '127'
];

$mangaIds = [
    '1632',
    '4452',
    '5771',
    '5772'
];

$titles = [

];

/**
 * @param string $pData
 * @param string $pEndpoint
 * @param string | null $pId
 */
$writeFile = function (string $pData, string $pEndpoint, string | null $pId) {
    $filename = __DIR__ . '/Fixture/_encyclopedia_api.xml' . '(' . $pEndpoint;

    if ($pId !== null) {
        $filename .= '_' . $pId . ')';
    }

    $filename .= '.json';

    echo 'Writing out file ' . $filename . "\r\n";
    file_put_contents($filename, $pData);
};

$apiUrl = DebugClient::DEFAULT_API_URL;

$client = new DebugClient($apiUrl);

echo "\r\n\r\n================================\r\n";
echo "Generating anime fixture data. \r\n";
echo "================================\r\n\r\n";

foreach ($animeIds as $animeId) {
    $result = $client->getAnime(['anime' => $animeId])->toArray();
    $writeFile(json_encode($result), 'anime', $animeId);
}

echo "\r\n\r\n================================\r\n";
echo "Generating manga fixture data. \r\n";
echo "================================\r\n\r\n";

foreach ($mangaIds as $mangaId) {
    $result = $client->getManga(['manga' => $mangaId])->toArray();
    $writeFile(json_encode($result), 'manga', $mangaId);
}
