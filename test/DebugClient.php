<?php

namespace sprak3000\AnimeNewsNetworkDataAPI\Test;

use sprak3000\AnimeNewsNetworkDataAPI\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;

/**
 * Class DebugClient
 *
 * This Client is meant to set up the History middleware. This
 * can then be used to retrieve the service response which is useful for
 * building Mocks.
 *
 * This client should not be used in production.
 */
class DebugClient extends Client
{
    /**
     * @var $mHistory
     */
    public $mHistory;

    public array $mContainer = [];

    /**
     * @param array $pOptions
     *
     * @return \GuzzleHttp\Client
     */
    protected function createHttpClient(array $pOptions = []): \GuzzleHttp\Client
    {
        $mock = array_key_exists('mock', $pOptions) ? $pOptions['mock'] : null;

        $this->mHistory = Middleware::history($this->mContainer);
        $stack = HandlerStack::create($mock);
        $stack->push($this->mHistory);

        $pOptions['handler'] = $stack;

        return parent::createHttpClient($pOptions);
    }
}
