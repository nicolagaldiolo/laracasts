<?php

abstract class HomeChecker {
    protected $successor;
    public abstract function check(HomeStatus $home);
    public function succeedWith(HomeChecker $successor){
        $this->successor = $successor;
    }
    public function next(HomeStatus $home)
    {
        if($this->successor){
            $this->successor->check($home);
        }else{
            var_dump("All Done!");
        }
    }
}

class Locks extends HomeChecker
{
    public function check(HomeStatus $home)
    {
        if( !$home->locked){
            throw new Exception('The doors are not looked!! Abor Abort.');
        }
        $this->next($home);
    }
}

class Lights extends HomeChecker
{
    public function check(HomeStatus $home)
    {
        if( !$home->lightOff){
            throw new Exception('The lights are still on!! Abor Abort.');
        }
        $this->next($home);
    }
}

class Alarm extends HomeChecker
{
    public function check(HomeStatus $home)
    {
        if( !$home->alarmOn){
            throw new Exception('The alarm are not been set!! Abor Abort.');
        }
        $this->next($home);
    }
}

// Il Chain of Responsibility pattern è un pattern utilizzato per creare una catena di oggetti, dove all'interno di ogni oggetto vengono fatti dei
// controlli, che, se NON vengono superati viene sollevata un eccezzione, altrimenti si prosegue la catena e viene invocato il prossimo
// oggetto da verificare.
// Pensiamo ad HomeStatus come l'oggetto request, se tutti i controlli vengono suerati si procede con la request, altrimenti viene sollevata l'eccezzione

class HomeStatus {
    public $alarmOn = true;
    public $locked = true;
    public $lightOff = true;
}

$locks = new Locks;
$lights = new Lights;
$alarm = new Alarm;

// Non facio altro che dire all'oggetto con quale altro oggetto proseguire la catena
$locks->succeedWith($lights);
$lights->succeedWith($alarm);

$locks->check(new HomeStatus);