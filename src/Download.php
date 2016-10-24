<?php
namespace Germania\Downloads;

use Germania\Worlds\Worlds;
use Germania\Categories\Categories;

class Download extends DownloadAbstract implements DownloadInterface
{

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Makes sure that there always exists a Categories object
     */
    public function getCategories() {
        if (!$categories = parent::getCategories()) {
            $this->setCategories( $categories = new Categories );
        }
        return $categories;
    }


    /**
     * Makes sure that there always exists a Worlds object
     */
    public function getWorlds() {
        if (!$worlds = parent::getWorlds()) {
            $this->setWorlds( $worlds = new Worlds );
        }
        return $worlds;
    }

}
