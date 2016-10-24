<?php
namespace Germania\Downloads;

class Downloads implements DownloadsInterface
{

    public $downloads  = array();


    public function push( DownloadsInterface $download )
    {
        $this->downloads[ $download->getId() ] = $download;
        return $this;
    }


    /**
     * @implements ContainerInterface
     * @return DownloadInterface
     */
    public function get( $id )
    {
        if ($this->has( $id )) {
            return $this->downloads[ $id ];
        }
        throw new DownloadNotFoundException("Could not find Download with ID '$id'");
    }


    /**
     * @implements ContainerInterface
     * @return boolean
     */
    public function has ($id )
    {
        return array_key_exists( $id, $this->downloads);
    }



    /**
     * @implements IteratorAggregate
     */
    public function getIterator()
    {
        return new \ArrayIterator( $this->downloads );
    }


    /**
     * @implements Countable
     */
    public function count()
    {
        return count($this->downloads);
    }
}
