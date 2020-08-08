<?php

// Il principio di open-close dice che una classe è aperta per l'implementazione ma non per la modifica
// La classe AreaCalculator NON deve essere più essere modificata ogni volta che viene aggiunto una nuova formula
// in quanto chiama il metodo area della classe che gli viene passata

interface Shape {
    public function area();
}

class Triangle implements Shape{
    public $sideSize;

    public function __construct($sideSize)
    {
        $this->sideSize = $sideSize;
    }
    public function area()
    {
        return ($this->sideSize * $this->sideSize) / 2;
    }
}

class Circle implements Shape {
    public $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }
    public function area()
    {
        return $this->radius * $this->radius * pi();
    }
}

class Square implements Shape {
    public $width;
    public $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }
    public function area()
    {
        return $this->width * $this->height;
    }
}

class AreaCalculator {
    public function calculate($shapes)
    {
        foreach ($shapes as $shape)
        {
            $area[] = $shape->area();
        }
        return array_sum($area);
    }
}

var_dump((new AreaCalculator)->calculate([new Square(2,4)]));
var_dump((new AreaCalculator)->calculate([new Circle(2)]));
var_dump((new AreaCalculator)->calculate([new Triangle(3)]));