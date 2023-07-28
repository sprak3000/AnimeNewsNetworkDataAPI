<?php

namespace sprak3000\AnimeNewsNetworkDataAPI\Test;

use PHPUnit\Framework\TestCase;
use sprak3000\AnimeNewsNetworkDataAPI\Client;

class ClientTest extends TestCase
{
    /**
     * Given a user of the API
     * When a new AnimeNewsNetworkDataAPI Service is created
     * Then a AnimeNewsNetworkDataAPI client is returned
     */
    public function testClientCreated()
    {
        $client = new Client();

        $this->assertInstanceOf(Client::class, $client);
    }

    /**
     * Given a user of the API
     * When a new AnimeNewsNetworkDataAPI Service is created
     * Then a AnimeNewsNetworkDataAPI client is returned with the proper Service Description and Base URL Host
     */
    public function testClientServiceDescriptionBaseUrlValue()
    {
        $client = new Client();

        $base = $client->getDescription()->getBaseUri();
        $uri = $client->getDescription()->getData('baseUri');
        $host = $base->getHost();

        $this->assertInstanceOf('GuzzleHttp\Psr7\Uri', $base);
        $this->assertEquals('cdn.animenewsnetwork.com', $host);
        $this->assertEquals('https://cdn.animenewsnetwork.com/encyclopedia/api.xml', $uri);
    }
}
