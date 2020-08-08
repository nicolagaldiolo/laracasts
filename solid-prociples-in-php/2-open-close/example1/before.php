<?php

// Il principio di open-close dice che una classe è aperta per l'implementazione ma non per la modifica
// La classe AreaCalculator deve essere modificata ogni volta che viene aggiunto una nuova formula e questo richiede una continua modifica

class Triangle {
    public $sideSize;

    public function __construct($sideSize)
    {
        $this->sideSize = $sideSize;
    }
}

class Circle {
    public $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }
}

class Square {
    public $width;
    public $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }
}

class AreaCalculator {
    public function calculate($shapes)
    {
        foreach ($shapes as $shape)
        {
            if($shape instanceof Square){
                $area[] = $shape->width * $shape->height;
            }elseif($shape instanceof Triangle){
                $area[] = ($shape->sideSize * $shape->sideSize) / 2;
            }elseif ($shape instanceof Circle){
                $area[] = $shape->radius * $shape->radius * pi();
            }
        }
        return array_sum($area);
    }
}

var_dump((new AreaCalculator)->calculate([new Square(2,4)]));
var_dump((new AreaCalculator)->calculate([new Circle(2)]));
var_dump((new AreaCalculator)->calculate([new Triangle(3)]));