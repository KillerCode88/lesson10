<?php

class LandVehicle
{
    protected $color;
    protected $wheelCount;

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function getWheelCount()
    {
        return $this->wheelCount;
    }

    public function setWheelCount($wheelCount)
    {
        $this->wheelCount = $wheelCount;
    }
}

interface Drivable
{
    public function startEngine();

    public function stopEngine();

    public function drive();

    public function brake();
}

class Car extends LandVehicle implements Drivable
{
    protected $color = 'white';
    protected $wheelCount = 4;
    private $seats = 5;

    public function getSeats()
    {
        return $this->seats;
    }

    public function startEngine()
    {
        echo 'Двигатель запущен';
    }

    public function stopEngine()
    {
        echo 'Двигатель заглушен';
    }

    public function drive()
    {
        echo 'Поехали';
    }

    public function brake()
    {
        echo 'Стоп';
    }
}

$car1 = new Car;
$car1->setColor('green');
$car2 = new Car;
$car2->getSeats();

class HomeAppliance
{
    protected $price;

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
}

interface Watchable
{
    public function turnOn();

    public function turnOff();

    public function watch();
}

class TV extends HomeAppliance implements Watchable
{
    private $screenSize;
    private $isSmart;

    public function __construct($screenSize, $isSmart, $price)
    {
        $this->screenSize = $screenSize;
        $this->isSmart = $isSmart;
        $this->price = $price;
    }

    public function turnOn()
    {
        echo 'Телевизор включен';
    }

    public function turnOff()
    {
        echo 'Телевизор выключен';
    }

    public function watch()
    {
        echo 'Смотрим';
    }
}

$tv1 = new TV(40, true, 10);
$tv1->setPrice(5);
$tv2 = new TV(50, false, 7);
$tv2->setPrice(5);

class WritingUtensil
{
    protected $color;
    protected $capacity;
}

interface Writable
{
    public function write();
}

class Pen extends WritingUtensil implements Writable
{
    public function refill($newColor)
    {
        $this->color = $newColor;
        $this->capacity = 10;
    }

    public function write()
    {
        if ($this->capacity === 0) {
            echo 'У вас закончились чернила';
            exit;
        }
        $this->capacity--;
    }
}

$pen1 = new Pen;
$pen1->refill('black');
$pen2 = new Pen;
$pen2->write();
$pen2->refill('red');

abstract class Goods
{
    protected $name;
    protected $price;
    protected $weight;
    protected $discount = 0;
    protected $delivery = 250;

    public function __construct($price, $weight)
    {
        $this->price = $price;
        $this->weight = $weight;
    }

    abstract function setName($name);

    protected function setDiscount()
    {
        $this->discount = 0;
    }

    protected function getPrice()
    {
        if ($this->discount !== 0) {
            $this->delivery = 300;
        }
        $newPrice = $this->price - ($this->price * $this->discount / 100) + $this->delivery;
        return $newPrice;
    }
}

class Goods1 extends Goods
{
    public function setName($name)
    {
        $this->name = $name;
        echo 'Продукт 1: ' . $name;
        return $this;
    }
}

class Goods2 extends Goods
{
    public function setName($name)
    {
        $this->name = $name;
        echo 'Продукт 2: ' . $name;
        return $this;
    }
}

class Goods3 extends Goods
{
    public function setName($name)
    {
        $this->name = $name;
        echo 'Продукт 2: ' . $name;
        return $this;
    }

    public function setDiscount()
    {
        if ($this->weight > 10) {
            $this->discount = 10;
        } else {
            $this->discount = 0;
        }
    }
}
