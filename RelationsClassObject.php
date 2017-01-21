<?php

// http://metanit.com/sharp/patterns/1.2.php

/**
 * Наследование (Обобщение)
 */
class Base
{
}
class SubBase
{
    protected function move() {}
}

/**
 * Реализация
 */
interface IWorker
{
    public function doSomething();
}
class Worker1 implements IWorker
{
    public function doSomething() {}
}

/**
 * Ассоциация разделяется на
 */
// Композиция
class Engine
{
}
class Car
{
    private $engine;
    public function __construct()
    {
        $this->engine = new Engine();
    }
}

// Агрегация
class Girlfriend
{
}
class Student
{
    private $girlfriend;
    public function __construct(Girlfriend $girlfriend)
    {
        $this->girlfriend = $girlfriend;
    }

    public function fuckGirlfriend() {}
}

/**
 * Зависимость
 */

class Event
{
}
class Window
{
    public function open(Event $event) {}
}