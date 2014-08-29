<?php

namespace Sportlobster\Bundle\DataBundle\Model;

use Sportlobster\Bundle\DataBundle\Model\DataInterface;

class News implements DataInterface
{
    protected $title;
    protected $description;
    protected $link;
    protected $guid;
    protected $pupDate;
    protected $category;
    protected $enclosure;

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function setPupDate($pupDate)
    {
        $this->pupDate = $pupDate;

        return $this;
    }

    public function getPupDate()
    {
        return $this->pupDate;
    }

    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    public function getCategory()
    {
        return $this->category;
    }
}
