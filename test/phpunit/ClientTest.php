<?php
namespace sprak3000\AnimeNewsNetworkDataAPI\Test;

use sprak3000\AnimeNewsNetworkDataAPI\Client;
use PHPUnit_Framework_TestCase;

class ClientTest extends PHPUnit_Framework_TestCase
{
  /**
   * Given a user of the API
   * When a new AnimeNewsNetworkDataAPI Service is created
   * Then a AnimeNewsNetworkDataAPI client is returned
   */
  public function testClientCreated()
  {
    $client = new AnimeNewsNetworkDataAPI\Client();

    $this->assertInstanceOf( 'sprak3000\AnimeNewsNetworkDataAPI\Client', $client );
  }

  /**
   * Given a user of the API
   * When a new AnimeNewsNetworkDataAPI Service is created
   * Then a AnimeNewsNetworkDataAPI client is returned with the proper Service Description and Base URL Host
   */
  public function testClientServiceDescriptionBaseUrlValue()
  {
    $client = new Client();

    $base = $client->getDescription()->getBaseUrl();
    $uri = $client->getDescription()->getData('baseUrl');
    $host = $base->getHost();

    $this->assertInstanceOf( 'GuzzleHttp\Url', $base );
    $this->assertEquals( 'cdn.animenewsnetwork.com', $host );
    $this->assertEquals( 'http://cdn.animenewsnetwork.com/encyclopedia', $uri );
  }
}