<?php
namespace sprak3000\AnimeNewsNetworkDataAPI\Test\GetManga;

use PHPUnit_Framework_TestCase;
use sprak3000\AnimeNewsNetworkDataAPI\Test\DebugClient;
use sprak3000\AnimeNewsNetworkDataAPI\Test\Mock\Adapter;

class UnitTest extends PHPUnit_Framework_TestCase
{
  const MANGA_ID = '1632';

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
  public function testGetManga()
  {
    $adapter = new Adapter();

    $client = new DebugClient(DebugClient::DEFAULT_API_URL, $adapter);

    /** @var \GuzzleHttp\Command\Model $result */
    $client->getManga(['manga' => self::MANGA_ID]);

    $response = $client->mHistory->getLastResponse();

    $this->assertEquals('200', $response->getStatusCode());
  }
}