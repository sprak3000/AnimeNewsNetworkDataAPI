<?php
namespace sprak3000\AnimeNewsNetworkDataAPI\Test\GetAnime;

use PHPUnit_Framework_TestCase;
use sprak3000\AnimeNewsNetworkDataAPI\Test\DebugClient;
use sprak3000\AnimeNewsNetworkDataAPI\Enum\Anime\Property;

class IntegrationTest extends PHPUnit_Framework_TestCase
{
  const VALID_ANIME_ID = '16148';

  const INVALID_ANIME_ID = '-1';

  /**
   * Given: A user querying for an anime
   * When: API is queried for a valid anime ID
   * Then: Expect a 200 response and all valid keys
   *
   * @group Integration
   * @group internet
   * @small
   *
   */
  public function testValidAnime()
  {
    $client = new DebugClient();

    /** @var \GuzzleHttp\Command\Model $result */
    $result = $client->getAnime(['anime' => self::VALID_ANIME_ID]);

    $response = $client->mHistory->getLastResponse();

    $this->assertEquals('200', $response->getStatusCode());

    $checkKeys = function ( $pAnime )
    {
      /** Expected # of top level array keys */
      $this->assertCount(1, $pAnime);

      $this->assertArrayHasKey(Property::KEY_ANIME, $pAnime);

      $this->assertArrayHasKey(Property::KEY_INFO, $pAnime[Property::KEY_ANIME]);

      $this->assertArrayHasKey(Property::KEY_NEWS, $pAnime[Property::KEY_ANIME]);
      $this->assertArrayHasKey(Property::KEY_STAFF, $pAnime[Property::KEY_ANIME]);
      $this->assertArrayHasKey(Property::KEY_CAST, $pAnime[Property::KEY_ANIME]);
      $this->assertArrayHasKey(Property::KEY_CREDIT, $pAnime[Property::KEY_ANIME]);
      $this->assertArrayHasKey(Property::KEY_RATINGS, $pAnime[Property::KEY_ANIME]);
    };

    $checkKeys($result);
  }

  /**
   * Given: A user querying for an anime
   * When: API is queried for an invalid anime ID
   * Then: Expect a warning key in the result array
   *
   * @group Integration
   * @group internet
   * @small
   *
   */
  public function testInvalidAnime()
  {
    $client = new DebugClient();

    /** @var \GuzzleHttp\Command\Model $result */
    $result = $client->getAnime(['anime' => self::INVALID_ANIME_ID]);

    $this->assertArrayHasKey(Property::KEY_WARNING, $result);
  }
}