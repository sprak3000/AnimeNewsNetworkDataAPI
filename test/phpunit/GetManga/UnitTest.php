<?php

namespace sprak3000\AnimeNewsNetworkDataAPI\Test\GetManga;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use sprak3000\AnimeNewsNetworkDataAPI\Test\DebugClient;

class UnitTest extends TestCase
{
    protected const MANGA_ID = '1632';

    /**
     * Given: A user querying the API
     * When: API is queried for a specific title
     * Then: Expect a 200 response
     *
     * @group Unit
     * @group internet
     * @small
     */
    public function testGetManga()
    {
        $mock = new MockHandler(
            [
            new Response(200, [], '<foo></foo>'),
            ]
        );

        $client = new DebugClient(DebugClient::DEFAULT_API_URL, ['mock' => $mock]);
        $client->getManga(['manga' => self::MANGA_ID]);

        $response = $client->mContainer[0]['response'];

        $this->assertEquals('200', $response->getStatusCode());
    }
}
