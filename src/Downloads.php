<?php
namespace Germania\Downloads;

class Downloads implements DownloadsInterface
{

    public $downloads  = array();


    public function push( DownloadInterface $download )
    {
        $this->downloads[ $download->getId() ] = $download;
        return $this;
    }


    /**
     * @return DownloadInterface
     */
    #[\ReturnTypeWillChange]
    public function get( $id )
    {
        if ($this->has( $id )) {
            return $this->downloads[ $id ];
        }
        throw new DownloadNotFoundException("Could not find Download with ID '$id'");
    }


    /**
     * @return boolean
     */
    #[\ReturnTypeWillChange]
    public function has ($id )
    {
        return array_key_exists( $id, $this->downloads);
    }



    #[\ReturnTypeWillChange]
    public function getIterator()
    {
        return new \ArrayIterator( $this->downloads );
    }


    #[\ReturnTypeWillChange]
    public function count()
    {
        return count($this->downloads);
    }
}
