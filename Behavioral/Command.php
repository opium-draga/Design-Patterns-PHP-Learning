<?php

/**
 * Interface Command
 * Commands interface
 */
abstract class Command
{
    protected $lamp;

    public function __construct(Lamp $lamp)
    {
        $this->lamp = $lamp;
    }

    public abstract function execute();
}

/**
 * Class CommandTurnOn
 * Concrete Command
 */
class CommandTurnOn extends Command
{
    public function execute()
    {
        $this->lamp->turnOn();
    }
}

/**
 * Class CommandTurnOff
 * Concrete Command
 */
class CommandTurnOff extends Command
{
    public function execute()
    {
        $this->lamp->turnOff();
    }
}

/**
 * Class Lamp
 * Receiver
 */
class Lamp
{
    public function turnOn()
    {
        echo "I'm bright and cheerful light";
    }
    public function turnOff()
    {
        echo "I am quiet and peaceful shadow";
    }
}

/**
 * Class LampCommandFactory
 * Factory for Commands
 * In this situation something like Invoker
 */
class LampCommandFactory
{
    public static function getCommand($type, Lamp $lamp)
    {
        switch ($type) {
            case 'ON':
                return new CommandTurnOn($lamp);
                break;

            case 'OFF':
                return new CommandTurnOn($lamp);
                break;

            default:
                throw new RuntimeException('Cannot find command ' . $type);
        }
    }
}

$lamp = new Lamp();
LampCommandFactory::getCommand("ON", $lamp)->execute();