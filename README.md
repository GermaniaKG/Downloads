# Germania KG · Downloads

**This package was destilled from legacy code!**   
You better do not want it to use this in production.

[![Packagist](https://img.shields.io/packagist/v/germania-kg/downloads.svg?style=flat)](https://packagist.org/packages/germania-kg/downloads)
[![PHP version](https://img.shields.io/packagist/php-v/germania-kg/downloads.svg)](https://packagist.org/packages/germania-kg/downloads)
[![Build Status](https://img.shields.io/travis/GermaniaKG/Downloads.svg?label=Travis%20CI)](https://travis-ci.org/GermaniaKG/Downloads)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/GermaniaKG/Downloads/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/Downloads/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/GermaniaKG/Downloads/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/Downloads/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/GermaniaKG/Downloads/badges/build.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/Downloads/build-status/master)

## Installation with Composer

```bash
$ composer require germania-kg/downloads
```

**MySQL:** This package requires some MySQL tables *downloads, downloads\_categories\_mm* and *downloads\_worlds\_mm* which you can install using `germania_downloads.sql` in `sql/` directory.


## Usage

While the *Downloads* class is a simple storage, *PdoDownloads* reads all downloads from the database. They both implement the [container-interop](https://github.com/container-interop/container-interop) (upcoming [PSR 11](https://github.com/php-fig/fig-standards/blob/master/proposed/container.md) standard), [IteratorAggregate](http://php.net/manual/de/class.iteratoraggregate.php) and SPL's [Countable](http://php.net/manual/de/class.countable.php). 

You can iterate over it all worlds due to its  interface, and you can retrieve single *Download* instances:

```php
<?php
use Germania\Downloads\Downloads;
use Germania\Downloads\PdoDownloads;
use Germania\Downloads\Download;

$downloads = new Downloads( );

$download = new Download;
$download->setUrl( 'http://...' );
$downloads->push( $download );

// Or, get all from PDO datebase:
$downloads = new PdoDownloads( $pdo );

// Check on ID and retrieve
$check = $downloads->has( 42 );
$my_download = $downloads->get( 42 );

echo $my_download->getUrl();
?>
```

## Development

```bash
$ git clone https://github.com/GermaniaKG/Downloads.git
$ cd Downloads
$ composer install
```

## Unit tests

Either copy `phpunit.xml.dist` to `phpunit.xml` and adapt to your needs, or leave as is. Run [PhpUnit](https://phpunit.de/) test or composer scripts like this:

```bash
$ composer test
# or
$ vendor/bin/phpunit
```

