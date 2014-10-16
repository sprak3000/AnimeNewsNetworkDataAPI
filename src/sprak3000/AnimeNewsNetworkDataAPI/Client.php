<?php
namespace sprak3000\AnimeNewsNetworkDataAPI;

use InvalidArgumentException;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Adapter\AdapterInterface;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Command\Model;

/**
 * Web service client for Anime News Network data
 *
 * @package sprak3000/AnimeNewsNetworkDataAPI
 *
 * @method Model getAnime() getAnime( array $pOptions )
 * @method Model getManga() getManga( array $pOptions )
 * @method Model getTitle() getTitle( array $pOptions )
 */
class Client extends GuzzleClient
{
  const DEFAULT_API_URL = 'http://cdn.animenewsnetwork.com/encyclopedia/api.xml';

  /**
   * Constructor
   *
   * @param string $pApiUrl Base API URL
   * @param AdapterInterface $pAdapter
   *
   * @throws InvalidArgumentException
   */
  public function __construct($pApiUrl = self::DEFAULT_API_URL, AdapterInterface $pAdapter = null)
  {
    // Setup the client options
    $options = array ();

    if ( null !== $pAdapter && $pAdapter instanceof AdapterInterface) {
      $options['adapter'] = $pAdapter;
    }

    parent::__construct($this->CreateHttpClient( $options ), $this->ConfigureResourceDescriptions($pApiUrl));
  }

  protected function CreateHttpClient( $pOptions = [] )
  {
    return new HttpClient( $pOptions );
  }

  protected function ConfigureResourceDescriptions ( $pApiUrl )
  {
    $resources = array ();

    $resources['baseUrl'] = $pApiUrl;

    /**
     * Iterate over the files in the Resources directory to populate the array of available
     * operations Guzzle can provide through this client.
     */
    $resources['operations'] = array ();
    foreach( glob(__DIR__ . "/Resource/*.php") as $file ) {
      require $file;
    }

    /**
     * These models are used by Guzzle to determine how to return the result
     * from any given call.
     *
     * The additionalProperties['location'] tells the guzzle response model
     * where to look for the response data and how to parse it.
     */
    $resources['models'] = [
      'XML_Resource' => [
        'type' => 'object',
        'additionalProperties' => [
          'location' => 'xml'
        ]
      ]
    ];

    return new Description($resources);
  }
}