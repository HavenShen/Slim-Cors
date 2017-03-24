# Slim Framework CORS Protection

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/HavenShen/Slim-Cors/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/HavenShen/Slim-Cors/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/HavenShen/Slim-Cors/badges/build.png?b=master)](https://scrutinizer-ci.com/g/HavenShen/Slim-Cors/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/HavenShen/Slim-Cors/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/HavenShen/Slim-Cors/?branch=master)
[![Build Status](https://travis-ci.org/HavenShen/Slim-Cors.svg?branch=master)](https://travis-ci.org/HavenShen/Slim-Cors)
[![Latest Stable Version](https://poser.pugx.org/HavenShen/Slim-Cors/v/stable.svg)](https://packagist.org/packages/HavenShen/Slim-Cors)
[![Latest Unstable Version](https://poser.pugx.org/HavenShen/Slim-Cors/v/unstable.svg)](https://packagist.org/packages/HavenShen/Slim-Cors)
[![Latest Stable Version](https://img.shields.io/packagist/v/HavenShen/Slim-Cors.svg?style=flat-square)](https://packagist.org/packages/HavenShen/Slim-Cors)
[![Total Downloads](https://img.shields.io/packagist/dt/HavenShen/Slim-Cors.svg?style=flat-square)](https://packagist.org/packages/HavenShen/Slim-Cors)
[![License](https://img.shields.io/packagist/l/HavenShen/Slim-Cors.svg?style=flat-square)](https://packagist.org/packages/HavenShen/Slim-Cors)

This repository contains a Slim Framework CORS middleware.

## Install

Via Composer

``` bash
$ composer require havenshen/slim-cors
```

Requires Slim 3.0.0 or newer.

## Usage

In most cases you want to register HavenShen\Slim\Cors.

### Register

```php
$app = new \Slim\App([
    'settings' => [
        'dispayErrorDetails' => true,
    ]
]);

$container = $app->getContainer();

$container['cors'] = function ($c) {
    return new \HavenShen\Slim\Cors\Guard;
};

$app->add($container->get('csrf'));
```

## Testing

``` bash
$ phpunit
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
