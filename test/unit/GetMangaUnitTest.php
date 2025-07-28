<?php

namespace sprak3000\AnimeNewsNetworkDataAPI\Test\GetManga;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;
use sprak3000\AnimeNewsNetworkDataAPI\Test\DebugClient;

#[Small]
class GetMangaUnitTest extends TestCase
{
    protected const MANGA_ID = '1632';

    /**
     * Given: A user querying the API
     * When: API is queried for a specific title
     * Then: Expect a 200 response
     *
     */
    #[Group('internet')]
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
