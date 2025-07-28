# CHANGELOG

## 3.1.0
This release updates the supported version of PHP to 8.3 and later along with updating the project dependencies.
Project file structure also updated for better support of latest PHPUnit best practices. Documentation updated to
reflect these changes.

## 3.0.0
This release moves the library into using PHP 8.

## 2.1.0
Migrating from Travis CI to GitHub actions for automatically running unit tests.

## 2.0.0
This release bumps the PHP version requirement to PHP 7.2 or higher. It also updates to the
latest API URL available.

## 1.0.0
This release moves the library into using PHP 7:

* Upgrade of Guzzle, Guzzle Services dependencies
* Upgrade of phpunit development dependency
* Code and tests updated for changes in dependencies 
* Code style updated to adhere to [PSR-2](http://www.php-fig.org/psr/psr-2/)
* Other code polish items to modernize the code base, e.g., type hints

## 0.4.1
Updating `Enum\AbstractProperty` to include a key for the ratings data. Integration tests updated accordingly.

## 0.4.0
Upgrading to Guzzle Services 0.5.0 to address XML issues mentioned in Issue 3. Required upgrading to Guzzle 5.* in turn
requiring a change in how the test framework behaves (uses new MockHandler class) and how the second parameter to 
`sprak3000\AnimeNewsNetworkDataAPI\Client` works. It now takes an array of Guzzle options; for the testing framework,
this means we pass `['handler' => $mockHandler]` in as the second parameter.

Also, the result returned by the API is now an array; you no longer need to call `toArray()`.

## 0.3.0
Proper PSR4 fix. 

## 0.2.0
PSR4 Fix

## 0.1.0
Initial release of the Anime News Network game data wrapper.
