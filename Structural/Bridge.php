<?php


/**
 * Class Shop
 * Abstraction
 */
abstract class Shop
{
    abstract function addProduct();

    public function sell()
    {
        // some base action
    }
}

class MobileShop extends Shop
{
    /**
     * @var ShopImp
     */
    private $imp;

    public function __construct($imp)
    {
        $this->imp = $imp;
    }

    function addProduct()
    {
        $this->imp->addProduct();
    }
}

/**
 * Class ShopImp
 * Implementation
 * It is not important to have implementation abstract class
 */
abstract class ShopImp
{
    abstract function addProduct();
}

class MobileShopImp extends ShopImp
{
    function addProduct()
    {
        // add somehow customer product
        $this->sendSms();
    }

    private function sendSms()
    {
        // send sms to consumer
    }
}

$imp = new MobileShopImp();
$shop = new MobileShop($imp);
$shop->addProduct();

