<?php

abstract class Item
{
    abstract public function getCost();
}

class Product extends Item
{
    private $cost = 0;

    public function __construct($cost)
    {
        $this->cost = $cost;
    }

    public function getCost()
    {
        return $this->cost;
    }
}

class Box extends Item
{
    /**
     * @var Item[]
     */
    protected $products = [];

    public function getCost()
    {
        $cost = 0;
        foreach ($this->products as $product) {
            $cost += $product->getCost();
        }

        return $cost;
    }

    public function addItem(Item $product)
    {
        $this->products[] = $product;
    }

    public function isEmpty()
    {
        return !count($this->products);
    }
}

$minBox1 = new Box();
$minBox1->addItem(new Product(100));

$minBox2 = new Box();
$minBox2->addItem(new Product(200));

$complexBox = new Box();
$complexBox->addItem($minBox1);
$complexBox->addItem($minBox2);

if (!$complexBox->isEmpty()) {
    $complexBox->getCost();
}