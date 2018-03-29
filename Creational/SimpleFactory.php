<?php

abstract class Product
{
    abstract function getTitle();
}

class FishProduct extends Product
{
    public function getTitle()
    {
        return "I'm a fish";
    }
}

class SugarProduct extends Product
{
    public function getTitle()
    {
        return "I'm a sugar";
    }
}

class ProductFactory
{
    public static function Create($productType)
    {
        switch ($productType) {
            case 'fish':
                return new FishProduct();
                break;

            case 'sugar':
                return new SugarProduct();
                break;

            default:
                return null;
        }
    }
}