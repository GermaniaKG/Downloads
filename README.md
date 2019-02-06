# Germania KG · Downloads

**This package was destilled from legacy code!**   
You better do not want it to use this in production.


## Installation

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


## Development and Testing

Develop using `develop` branch, using [Git Flow](https://github.com/nvie/gitflow).   
**Currently, no tests are specified.**

```bash
$ git clone git@github.com:GermaniaKG/Downloads.git germania-downloads
$ cd germania-downloads
$ cp phpunit.xml.dist phpunit.xml
$ phpunit
```
