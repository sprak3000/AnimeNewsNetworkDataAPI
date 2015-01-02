Anime News Network Data Client
==============================
[![Build Status](http://travis-ci.org/sprak3000/AnimeNewsNetworkDataAPI.svg)](http://github.com/sprak3000/AnimeNewsNetworkDataAPI)

This is a PHP client wrapper for the [Anime News Network](http://www.animenewsnetwork.com/encyclopedia/api.php) data
API. If you are interested in contributing back to this project, feel free to read the *Contributing* documentation
below.

**NOTE:** 
Using this client to retrieve data, you must still abide by the ANN API terms of service:

"When using this API to display information on a public website, you must list Anime News Network as the
source of the data and link to Anime News Network on every page that incorporates data from the API."

Usage
-----
```php
<?php
$client = new sprak3000\AnimeNewsNetworkDataAPI\Client();
$anime = $client->getAnime(['anime' => '16148']);
$manga = $client->getManga(['manga' => '4199']);
```

### Errors

Unfortunately, the ANN API does not return a non 200 HTTP response code for an invalid / not found ID. To check for an
error, look for a `warning` key in the result array.

### Known Limitations / Issues
This wrapper uses [Guzzle](https://github.com/guzzle/guzzle) and its [services](https://github.com/guzzle/guzzle-services)
library. Its parsing of the XML returned by the ANN API results in some data being lost in the conversion, particularly
the attributes on the top level XML tag and an image tags nested in the response.

Installing via Composer
-----------------------
```
composer require sprak3000/AnimeNewsNetworkDataAPI
```

Travis CI
---------
This project uses [Travis CI](https://travis-ci.org/sprak3000/AnimeNewsNetworkDataAPI) for build and continuous integration.

Documentation
-------------
All documentation can be found in the [doc](https://github.com/sprak3000/AnimeNewsNetworkDataAPI/blob/master/doc) folder.

Contributing
------------
* [Getting Started](https://github.com/sprak3000/AnimeNewsNetworkDataAPI/blob/master/doc/CONTRIBUTING.md)
* [Bug Reports](https://github.com/sprak3000/AnimeNewsNetworkDataAPI/blob/master/doc/CONTRIBUTING.md#bug-reports)
* [Feature Requests](https://github.com/sprak3000/AnimeNewsNetworkDataAPI/blob/master/doc/CONTRIBUTING.md#feature-requests)
* [Pull Requests](https://github.com/sprak3000/AnimeNewsNetworkDataAPI/blob/master/doc/CONTRIBUTING.md#pull-requests)
