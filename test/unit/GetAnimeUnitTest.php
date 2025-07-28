<?php

namespace sprak3000\AnimeNewsNetworkDataAPI\Test\GetAnime;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;
use sprak3000\AnimeNewsNetworkDataAPI\Test\DebugClient;

#[Small]
class GetAnimeUnitTest extends TestCase
{
    protected const ANIME_ID = '16148';

    /**
     * Given: A user querying the API
     * When: API is queried for a specific title
     * Then: Expect a 200 response
     *
     */
    #[Group('internet')]
    public function testGetAnime()
    {
        $mock = new MockHandler(
            [
            new Response(200, [], '<foo></foo>')
            ]
        );

        $client = new DebugClient(DebugClient::DEFAULT_API_URL, ['mock' => $mock]);
        $client->getAnime(['anime' => self::ANIME_ID]);

        $response = $client->mContainer[0]['response'];

        $this->assertEquals('200', $response->getStatusCode());
    }
}
