<?php

class Room {
    private $roomAmount = 0;
    private $cost = 0;

    public function setRoomAmount($roomAmount)
    {
        $this->roomAmount = $roomAmount;
    }

    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    public function __toString()
    {
        return "Cost: {$this->cost}, rooms: {$this->roomAmount}</br>";
    }
}

abstract class RoomBuilder
{
    /**
     * @var Room
     */
    protected $room;

    public function __construct()
    {
        $this->room = new Room();
    }

    public abstract function buildRoomAmount();
    public abstract function buildCost();

    public function getRoom()
    {
        return $this->room;
    }
}

class LuxuryRoomBuilder extends RoomBuilder
{
    public function buildRoomAmount()
    {
        $this->room->setRoomAmount(5);
    }

    public function buildCost()
    {
        $this->room->setCost(1000000);
    }
}

class PureRoomBuilder extends RoomBuilder
{
    public function buildRoomAmount()
    {
        $this->room->setRoomAmount(1);
    }

    public function buildCost()
    {
        $this->room->setCost(1000);
    }
}

class Director
{
    /**
     * @var RoomBuilder
     */
    private $builder;

    public function __construct(RoomBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function buildRoom()
    {
        $this->builder->buildCost();
        $this->builder->buildRoomAmount();

        return $this->builder->getRoom();
    }
}


$director = new Director(new LuxuryRoomBuilder());
echo $director->buildRoom();

$pureDirector = new Director(new PureRoomBuilder());
echo $pureDirector->buildRoom();
