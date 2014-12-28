<?php
namespace sprak3000\AnimeNewsNetworkDataAPI\Test\Mock;

use GuzzleHttp\Ring\Client\MockHandler;

class Handler extends MockHandler
{
  public function __construct()
  {
    parent::__construct(['status' => 200]);
  }
}