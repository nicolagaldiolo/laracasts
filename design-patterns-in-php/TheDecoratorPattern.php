<?php

// Con il decorator pattern posso decorare delle classi con altri oggetti che implementano la stessa interfaccia
// posso iniettare una classe all'interno del costruttore dell'altra
// https://medium.com/@sirajul.anik/understanding-decorator-pattern-with-php-implementation-7f536e742bb0

interface Maintenance {
    public function getPrice();
}

class cuttingCar implements Maintenance
{
    protected $price = 25;

    public function getPrice()
    {
        return $this->price;
    }
}

class changeOil implements Maintenance
{
    protected $price = 20;
    protected $maintenance;
    public function __construct(Maintenance $maintenance){
        $this->maintenance = $maintenance;
    }

    public function getPrice()
    {
        return $this->price + $this->maintenance->getPrice();
    }
}

class wheelChange implements Maintenance
{
    protected $price = 10;
    protected $maintenance;
    public function __construct(Maintenance $maintenance){
        $this->maintenance = $maintenance;
    }
    public function getPrice()
    {
        return $this->price + $this->maintenance->getPrice();
    }
}

$cuttingCar = new cuttingCar();
$changeOil = new changeOil($cuttingCar);
$wheelChange = new wheelChange($changeOil);
var_dump($wheelChange->getPrice());