<?php
namespace Germania\Downloads;

use Germania\Worlds\WorldsInterface;
use Germania\Worlds\WorldsProviderInterface;
use Germania\Categories\CategoriesProviderInterface;

interface DownloadInterface extends CategoriesProviderInterface, WorldsProviderInterface
{

    public function getId();
    public function setId( $id );

    public function getType();
    public function setType( $type );

    public function getName();
    public function setName( $name );

    public function getDescription();
    public function setDescription( $description );

    public function getUrl();
    public function setUrl( $url );

}
