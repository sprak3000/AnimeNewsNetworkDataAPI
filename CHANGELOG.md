#CHANGELOG

##0.4.1

Updating `Enum\AbstractProperty` to include a key for the ratings data. Integration tests updated accordingly.

##0.4.0

Upgrading to Guzzle Services 0.5.0 to address XML issues mentioned in Issue 3. Required upgrading to Guzzle 5.* in turn
requiring a change in how the test framework behaves (uses new MockHandler class) and how the second parameter to 
`sprak3000\AnimeNewsNetworkDataAPI\Client` works. It now takes an array of Guzzle options; for the testing framework,
this means we pass `['handler' => $mockHandler]` in as the second parameter.

Also, the result returned by the API is now an array; you no longer need to call `toArray()`.

##0.3.0

Proper PSR4 fix. 

##0.2.0

PSR4 Fix

##0.1.0

Initial release of the Anime News Network game data wrapper.