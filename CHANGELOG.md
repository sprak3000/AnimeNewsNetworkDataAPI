# CHANGELOG

## 0.2.0

Upgrading to Guzzle Services 0.5.0 to address XML issues mentioned in Issue 3. Required upgrading to Guzzle 5.* in turn
requiring a change in how the test framework behaves (uses new MockHandler class) and how the second parameter to 
`sprak3000\AnimeNewsNetworkDataAPI\Client` works. It now takes an array of Guzzle options; for the testing framework,
this means we pass `['handler' => $mockHandler]` in as the second parameter.

## 0.1.0

Initial release of the Anime News Network game data wrapper.