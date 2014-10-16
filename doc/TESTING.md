# Testing
As mentioned in the [contributing guidelines](CONTRIBUTING.md) document, all
pull requests related to new features or bug fixes should contain relevant
tests, that pass.

In order to write tests for this project, you'll need to know how it's built
and how it expects unit tests to be written and executed.

First and foremost, you will always want to make sure that when you run
phpunit for this library that you bootstrap it so that it is able to
autoload classes.

For example, if you were to run all of the unit and integration tests at once,
your command would look like this:

```bash
  phpunit --bootstrap test/phpunit/bootstrap.php test/phpunit/
```

## Debug Client
Most tests written for this library will require the Debug Client. The
primary difference between the release client and the debug client is
that the debug client attaches Guzzle's Subscriber History listener on the
Guzzle Http client event emitter.

This listener allows us to get additional information back from the client
by accessing the DebugClient's mHistory property.

For example, if we wanted to get the last response from a DebugClient we
would execute the following code in our scripts:

```php
  $response = $client->mHistory->getLastResponse();
```

The response object return has the ability to provide the Headers returned
by the request as well as the status code, effective url that was called
and th body of the response in its original format.

All of these methods are invaluable when writing unit tests. To see these
types of methods in action, review the `/test/phpunit/GetAllChampions/IntegrationTest.php`
file and the tests contained in it.

## Integration Tests
For this project "Integration Tests" are small tests that call out to the
live service and perform a handful of tests. Usually you only want to try
from one to five tests, generally around successful or known failure stats from
the API itself, just so that you can test basic connectivity and that
nothing drastic has changed with the responses.

You do not want to build a large suite of integration tests as you don't
want to hammer the service every time you're testing, or every time a build
runs. Since you're going to be building your Mock tests off of the live
service calls, it somewhat reduces the need for integration tests, though
certainly not completely.

Whenever you want to run the existing integration tests, you can execute the
following command in your bash shell.

```bash
  phpunit --bootstrap test/phpunit/bootstrap.php --group Integration test/phpunit/
```

## Unit Tests

The unit tests are for testing individual units of source code. For this project, we are effectively testing the service
description file since we are built on Guzzle, and it already has its own unit tests. This basically means all we really
need to test are our integration points.

Whenever you want to run the existing unit tests, you can execute the following command in your bash shell.

```bash
  phpunit --bootstrap test/phpunit/bootstrap.php --group Unit test/phpunit/
```

### Generating Fixtures

The unit tests depend on having fixtures available to return; we have samples checked into the repo. If you find you
need to regenerate them, you can run the following script from the root of the project:

```bash
  $ chmod +x test/phpunit/generateFixtures.php
  $ ./test/phpunit/generateFixtures.php
```