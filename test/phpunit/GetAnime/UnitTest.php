<?php

namespace sprak3000\AnimeNewsNetworkDataAPI\Test\GetAnime;

use \PHPUnit\Framework\TestCase;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use sprak3000\AnimeNewsNetworkDataAPI\Test\DebugClient;

class UnitTest extends TestCase
{
    const ANIME_ID = '16148';

    /**
     * Given: A user querying the API
     * When: API is queried for a specific title
     * Then: Expect a 200 response
     *
     * @group Unit
     * @group internet
     * @small
     *
     */
    public function testGetAnime()
    {
        $mock = new MockHandler([
            new Response(200, [], '<foo></foo>')
        ]);

        $client = new DebugClient(DebugClient::DEFAULT_API_URL, ['mock' => $mock]);
        $client->getAnime(['anime' => self::ANIME_ID]);

        $response = $client->mContainer[0]['response'];

        $this->assertEquals('200', $response->getStatusCode());
    }
}
