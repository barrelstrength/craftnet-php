# Craftnet API PHP Wrapper

A PHP library which implements the functionality of the Craftnet API. See the Craftnet API [documentation](https://docs.api.craftcms.com) for all available settings.

## Installation

Add the library to your project via composer:

``` php
{
    "require": {
        "barrelstrength/craftnet-php": "{version}"
    }
}
```

Require the library in your project:

``` php
require __DIR__ . '/vendor/autoload.php';
```

## Authentication

To authenticate with Craftnet set your `username` and `apiKey` values when instantiating a new `CraftnetClient` class.
 
``` php
use barrelstrength\craftnetphp\CraftnetClient;

$username = 'USERNAME';
$apiKey = 'API_KEY;

$client = new CraftnetClient($username, $apiKey);
```

## Get all plugin licenses for the authenticated Craft ID user

``` php
$response = $client->pluginLicenses->get();

$pluginLicenses = $response->getBody()->getContents();

$results = json_decode($pluginLicenses);
```

## Get a secondary page of plugin licenses for the authenticated Craft ID user

``` php
$response = $client->pluginLicenses->get([
  'page' => 2
]);

$pluginLicenses = $response->getBody()->getContents();

$results = json_decode($pluginLicenses);
```

## Get a specific plugin license for the authenticated Craft ID user

``` php
<?php
$response = $client->pluginLicenses->get([
    'key' => 'P8GQRVQO5MK9Q673U0IJZ2I3'
]);

$pluginLicense = $response->getBody()->getContents();

$result = json_decode($pluginLicense)
```

## Create a new license for a given Craft ID user

``` php
$response = $client->pluginLicenses->create([
  'edition' => 'standard',
  'plugin' => 'sprout-forms',
  'email' => 'sprout@barrelstrengthdesign.com'
]);

$pluginLicense = $response->getBody()->getContents();

$result = json_decode($pluginLicense)
```