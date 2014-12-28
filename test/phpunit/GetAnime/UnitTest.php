<?php
namespace sprak3000\AnimeNewsNetworkDataAPI\Test\GetAnime;

use PHPUnit_Framework_TestCase;
use sprak3000\AnimeNewsNetworkDataAPI\Test\DebugClient;
use sprak3000\AnimeNewsNetworkDataAPI\Test\Mock\Handler;

class UnitTest extends PHPUnit_Framework_TestCase
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
    $handler = new Handler();

    $client = new DebugClient(DebugClient::DEFAULT_API_URL, ['handler' => $handler]);

    /** @var \GuzzleHttp\Command\Model $result */
    $client->getAnime(['anime' => self::ANIME_ID]);

    $response = $client->mHistory->getLastResponse();

    $this->assertEquals('200', $response->getStatusCode());
  }
}