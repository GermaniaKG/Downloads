<?php
namespace Germania\Downloads;

use Germania\Worlds\WorldsInterface;
use Germania\Categories\CategoriesInterface;

abstract class DownloadAbstract implements DownloadInterface
{

    public $download_file_name;
    public $id;
    public $slug;
    public $type;
    public $name;
    public $description;
    public $url;
    public $worlds = array();
    public $categories = array();




    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of slug.
     *
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Sets the value of slug.
     *
     * @param mixed $slug the slug
     *
     * @return self
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Gets the value of type.
     *
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the value of type.
     *
     * @param mixed $type the type
     *
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Gets the value of name.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param mixed $name the name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the value of description.
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the value of description.
     *
     * @param mixed $description the description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets the value of url.
     *
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Sets the value of url.
     *
     * @param mixed $url the url
     *
     * @return self
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Gets the value of worlds.
     *
     * @return WorldsInterface
     */
    public function getWorlds()
    {
        return $this->worlds;
    }

    /**
     * Sets the value of worlds.
     *
     * @param WorldsInterface $worlds the worlds
     *
     * @return self
     */
    public function setWorlds( WorldsInterface $worlds)
    {
        $this->worlds = $worlds;

        return $this;
    }

    /**
     * Gets the value of categories.
     *
     * @return CategoriesInterface
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Sets the value of categories.
     *
     * @param CategoriesInterface $categories the categories
     *
     * @return self
     */
    public function setCategories( CategoriesInterface $categories)
    {
        $this->categories = $categories;

        return $this;
    }

}
