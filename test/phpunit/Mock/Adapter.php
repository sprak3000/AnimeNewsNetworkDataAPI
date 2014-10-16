<?php
namespace sprak3000\AnimeNewsNetworkDataAPI\Test\Mock;

use GuzzleHttp\Adapter\MockAdapter;
use GuzzleHttp\Adapter\TransactionInterface;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;

class Adapter extends MockAdapter
{
  public function __construct()
  {
    $transaction = function(TransactionInterface $pTrans)
    {
      $request = $pTrans->getRequest();
      $url = $request->getPath();
      $url = str_replace("/", "_", $url);

      $query = $request->getQuery();
      $query = "(" . $query;
      $query = str_replace("&", ",", $query);
      $query = str_replace("=", "_", $query);
      $query = $query . ")";

      $file = $url . $query . ".json";
      $contents = file_get_contents(__DIR__ . "/../Fixture/" . $file);

      $stream = Stream::factory('<ann><anime></anime></ann>');
      $response = new Response(200, [], $stream);
      return $response;
    };

    parent::__construct($transaction);
  }
}