<?php

abstract class PrototypeCategory
{
    protected $category;

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    abstract public function __clone();
}

class CategoryGame extends PrototypeCategory
{
    protected $category = 'Game';
    protected $additionalField = [];

    public function __clone()
    {
        array_push($this->additionalField, [1,2,3]);
        // some other calls, operations
    }
}

class CategorySport extends PrototypeCategory
{
    protected $category = 'Sport';
    protected $additionalField = [];

    public function __clone()
    {
        // some other calls, operations
    }
}

$sportCategory = new CategorySport();
$gameCategory = new CategoryGame();

$obj1 = clone $sportCategory;
$obj2 = clone $gameCategory;
