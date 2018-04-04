<?php


class Control
{
    protected $device;

    public function __construct(Device $device)
    {
        $this->device = $device;
    }

    public function turnOnOff($on = true)
    {
        return $on ? $this->device->enable() : $this->device->disable();
    }

    public function volumeUp()
    {
        $this->device->setVolume($this->device->getVolume() + 10);
    }

    public function volumeDown()
    {
        $this->device->setVolume($this->device->getVolume() - 10);
    }
}

class AdvancedControl extends Control
{
    public function mute()
    {
        $this->device->setVolume(0);
    }
}

abstract class Device
{
    abstract function enable();
    abstract function disable();
    abstract function setVolume($value);
    abstract function getVolume();
}

class TV extends Device
{
    function enable()
    {
        // TODO: Implement enable() method.
    }

    function disable()
    {
        // TODO: Implement disable() method.
    }

    function setVolume($value)
    {
        // TODO: Implement setVolume() method.
    }

    function getVolume()
    {
        // TODO: Implement getVolume() method.
    }
}

class Radio extends Device
{
    function enable()
    {
        // TODO: Implement enable() method.
    }

    function disable()
    {
        // TODO: Implement disable() method.
    }

    function setVolume($value)
    {
        // TODO: Implement setVolume() method.
    }

    function getVolume()
    {
        // TODO: Implement getVolume() method.
    }
}

$radioDevice = new Radio();
$control = new Control($radioDevice);
$control->turnOnOff();
$control->volumeUp();
$control->turnOnOff(false);

$tvDevice = new TV();
$tvControl = new AdvancedControl($tvDevice);
$tvControl->turnOnOff();
$tvControl->volumeUp();
$tvControl->mute();
$tvControl->turnOnOff(false);
