# Anime News Network Data Client
[![Tests](https://github.com/sprak3000/AnimeNewsNetworkDataAPI/workflows/Tests/badge.svg)](https://github.com/sprak3000/AnimeNewsNetworkDataAPI/actions?query=workflow%3ATests)
[![Maintainability](https://qlty.sh/gh/sprak3000/projects/AnimeNewsNetworkDataAPI/maintainability.svg)](https://qlty.sh/gh/sprak3000/projects/AnimeNewsNetworkDataAPI)
[![Code Coverage](https://qlty.sh/gh/sprak3000/projects/AnimeNewsNetworkDataAPI/coverage.svg)](https://qlty.sh/gh/sprak3000/projects/AnimeNewsNetworkDataAPI)

This is a PHP client wrapper for the [Anime News Network](http://www.animenewsnetwork.com/encyclopedia/api.php) data
API. If you are interested in contributing back to this project, feel free to read the *Contributing* documentation
below.

**NOTE:** 
When using this client to retrieve data, you must still abide by the ANN API terms of service:

> When using this API to display information on a public website, you must list Anime News Network as the
source of the data and link to Anime News Network on every page that incorporates data from the API.

## Requires
* PHP ^8.0
* [Composer](https://getcomposer.org/) (to install this library)

## Usage
```php
<?php
$client = new sprak3000\AnimeNewsNetworkDataAPI\Client();
$anime = $client->getAnime(['anime' => '16148'])->toArray();
$manga = $client->getManga(['manga' => '4199'])->toArray();
```

### Detecting API Errors
Unfortunately, the ANN API does not return a non 200 HTTP response code for an invalid / not found ID. To check for an
error, look for a `warning` key in the result array.

### Known Limitations / Issues
None at this time.

## Installing via Composer
```
composer require sprak3000/AnimeNewsNetworkDataAPI
```

## Continuous Integration
This project uses [GitHubActions](https://github.com/sprak3000/AnimeNewsNetworkDataAPI/actions) for build and continuous integration.

## Documentation
All documentation can be found in the [doc](https://github.com/sprak3000/AnimeNewsNetworkDataAPI/blob/master/doc) folder.

## Contributing
* [Getting Started](https://github.com/sprak3000/AnimeNewsNetworkDataAPI/blob/master/doc/CONTRIBUTING.md)
* [Bug Reports](https://github.com/sprak3000/AnimeNewsNetworkDataAPI/blob/master/doc/CONTRIBUTING.md#bug-reports)
* [Feature Requests](https://github.com/sprak3000/AnimeNewsNetworkDataAPI/blob/master/doc/CONTRIBUTING.md#feature-requests)
* [Pull Requests](https://github.com/sprak3000/AnimeNewsNetworkDataAPI/blob/master/doc/CONTRIBUTING.md#pull-requests)
