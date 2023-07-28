<?php

namespace sprak3000\AnimeNewsNetworkDataAPI\Test\GetManga;

use PHPUnit\Framework\TestCase;
use sprak3000\AnimeNewsNetworkDataAPI\Test\DebugClient;
use sprak3000\AnimeNewsNetworkDataAPI\Enum\Manga\Property;

class IntegrationTest extends TestCase
{
    protected const VALID_MANGA_ID = '1632';

    protected const INVALID_MANGA_ID = '-1';

    /**
     * Given: A user querying the API
     * When: API is queried for a valid manga ID
     * Then: Expect a 200 response and all valid keys
     *
     * @group Integration
     * @group internet
     * @small
     */
    public function testValidManga()
    {
        $client = new DebugClient();

        $result = $client->getManga(['manga' => self::VALID_MANGA_ID]);

        $response = $client->mContainer[0]['response'];

        $this->assertEquals('200', $response->getStatusCode());

        $checkKeys = function ($pManga) {
            // Expected # of top level array keys
            $this->assertCount(1, $pManga);

            $this->assertArrayHasKey(Property::KEY_MANGA, $pManga);
            $this->assertArrayHasKey(Property::KEY_INFO, $pManga[Property::KEY_MANGA]);

            $this->assertArrayHasKey(Property::KEY_NEWS, $pManga[Property::KEY_MANGA]);
            $this->assertArrayHasKey(Property::KEY_STAFF, $pManga[Property::KEY_MANGA]);
            $this->assertArrayHasKey(Property::KEY_RELEASE, $pManga[Property::KEY_MANGA]);
            $this->assertArrayHasKey(Property::KEY_RATINGS, $pManga[Property::KEY_MANGA]);
        };

        $checkKeys($result);
    }

    /**
     * Given: A valid API key
     * When: API is queried for an invalid artifact ID
     * Then: Expect a warning key in the result array
     *
     * @group Integration
     * @group internet
     * @small
     */
    public function testInvalidManga()
    {
        $client = new DebugClient();

        $result = $client->getManga(['manga' => self::INVALID_MANGA_ID])->toArray();

        $this->assertArrayHasKey(Property::KEY_WARNING, $result);
    }
}
