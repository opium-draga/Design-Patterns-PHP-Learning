<?php

// http://metanit.com/sharp/patterns/2.1.php

// Когда заранее неизвестно, объекты каких типов необходимо создавать

// Когда система должна быть независимой от процесса создания новых объектов и расширяемой:
// в нее можно легко вводить новые классы, объекты которых система должна создавать.

// Когда создание новых объектов необходимо делегировать из базового класса классам наследникам

abstract class Race
{
    protected $nickName;

    abstract function getName();

    public function setNickName($nickName)
    {
        $this->nickName = $nickName;
    }
}

class Avengers extends Race
{
    public function getName()
    {
        return "The Avengers";
    }
}

class XMen extends Race
{
    public function getName()
    {
       return "X-Mans";
    }
}

abstract class HeroFactory
{
    public function create($nickName)
    {
        /**
         * @var $hero Race
         */
        $hero = $this->createHero();
        $hero->setNickName($nickName);

        return $hero;
    }

    abstract protected function createHero();
}

class AvengersFactory extends HeroFactory
{
    protected function createHero()
    {
        return new Avengers();
    }
}

class XMenFactory extends HeroFactory
{
    protected function createHero()
    {
        return new XMen();
    }
}

$avengersFactory = new AvengersFactory();
$avengers = $avengersFactory->create("Valeron");

$xManFactory = new XMenFactory();
$xMan = $xManFactory->create("Petros");

