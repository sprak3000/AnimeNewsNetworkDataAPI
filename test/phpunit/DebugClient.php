<?php
namespace sprak3000\AnimeNewsNetworkDataAPI\Test;

use sprak3000\AnimeNewsNetworkDataAPI\Client;
use GuzzleHttp\Subscriber\History;

/**
 * Class DebugClient
 *
 * This Client is meant to set up the Subscriber History listener. This
 * can then be used to retrieve the service response which is useful for
 * building Mocks.
 *
 * This client should not be used in production.
 */
class DebugClient extends Client
{
  /**
   * @var History $mHistory
   */
  public $mHistory;

  /**
   * @param array $pOptions
   *
   * @return \GuzzleHttp\Client
   */
  protected function CreateHttpClient($pOptions=[])
  {
    $client = parent::CreateHttpClient($pOptions);

    $this->mHistory = new History();
    $client->getEmitter()->attach($this->mHistory);

    return $client;
  }
}