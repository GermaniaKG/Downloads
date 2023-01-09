<?php
namespace Germania\Downloads;

use Interop\Container\ContainerInterface;

interface DownloadsInterface extends \IteratorAggregate, \Countable, ContainerInterface
{
    public function push( DownloadInterface $download );
}
