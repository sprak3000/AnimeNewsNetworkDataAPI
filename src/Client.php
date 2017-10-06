<?php

namespace sprak3000\AnimeNewsNetworkDataAPI;

use InvalidArgumentException;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Command\Model;

/**
 * Web service client for Anime News Network data
 *
 * @package sprak3000/AnimeNewsNetworkDataAPI
 *
 * @method Model getAnime() getAnime(array $pOptions)
 * @method Model getManga() getManga(array $pOptions)
 * @method Model getTitle() getTitle(array $pOptions)
 */
class Client extends GuzzleClient
{
    const DEFAULT_API_URL = 'http://cdn.animenewsnetwork.com/encyclopedia/api.xml';

    /**
     * Constructor
     *
     * @param string $pApiUrl Base API URL
     * @param array $pOptions
     *
     * @throws InvalidArgumentException
     */
    public function __construct($pApiUrl = self::DEFAULT_API_URL, $pOptions = [])
    {
        parent::__construct($this->CreateHttpClient($pOptions), $this->ConfigureResourceDescriptions($pApiUrl));
    }

    protected function CreateHttpClient(array $pOptions = [])
    {
        return new HttpClient($pOptions);
    }

    protected function ConfigureResourceDescriptions($pApiUrl)
    {
        $resources = [
            'baseUri' => $pApiUrl,
            'operations' => [],
            /**
             * These models are used by Guzzle to determine how to return the result
             * from any given call.
             *
             * The additionalProperties['location'] tells the guzzle response model
             * where to look for the response data and how to parse it.
             */
            'models' => [
                'XML_Resource' => [
                    'type' => 'object',
                    'additionalProperties' => [
                        'location' => 'xml'
                    ]
                ]
            ]
        ];

        /**
         * Iterate over the files in the Resources directory to populate the array of available
         * operations Guzzle can provide through this client.
         */
        foreach (glob(__DIR__ . '/Resource/*.php') as $file) {
            require $file;
        }

        return new Description($resources);
    }
}
