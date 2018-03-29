<?php

abstract class Weapon
{
    public abstract function hit();
}

class SwordWeapon extends Weapon
{
    public function hit()
    {
        echo "Sword hit";
    }
}

class ArbaletWeapon extends Weapon
{
    public function hit()
    {
        echo "Arbalet hit";
    }
}

abstract class Movement
{
    public abstract function move();
}

class FlyMovement extends Movement
{
    public function move()
    {
        echo "Fly movement";
    }
}

class RunMovement extends Movement
{
    public function move()
    {
        echo "Run movement";
    }
}

abstract class HeroFactory
{
    public abstract function createWeapon();
    public abstract function createMovement();
}

class ElfFactory extends HeroFactory
{
    public function createWeapon()
    {
        return new ArbaletWeapon();
    }

    public function createMovement()
    {
        return new FlyMovement();
    }
}

class WarriorFactory extends HeroFactory
{
    public function createWeapon()
    {
        return new SwordWeapon();
    }

    public function createMovement()
    {
        return new RunMovement();
    }
}

class Hero
{
    /**
     * @var Weapon
     */
    private $weapon;

    /**
     * @var Movement
     */
    private $movement;

    public function __construct(HeroFactory $factory)
    {
        $this->weapon = $factory->createWeapon();
        $this->movement = $factory->createMovement();
    }

    public function move()
    {
        $this->movement->move();
    }

    public function hit()
    {
        $this->weapon->hit();
    }
}


$elf = new Hero(new ElfFactory());
$elf->move();
$elf->hit();

$warrior = new Hero(new WarriorFactory());
$warrior->move();
$warrior->hit();