<?php

class Team
{
    protected $name;
    protected $members;
    public function __construct($name, $members = [])
    {
        $this->name = $name;
        $this->members = $members;
    }
    // Creo un "costruttore statico"
    public static function start(...$params)
    {
        return new static(...$params); //Chaimo il costruttore passando tutti i parametri
    }
    public function name()
    {
        return $this->name;
    }
    public function members()
    {
        return $this->members;
    }
    public function add($name)
    {
        $this->members[] = $name;
    }
    public function cancel()
    {
    }
    public function manager()
    {
    }
}

class Member
{
    protected $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function lastViewed()
    {
    }
}

// Instanza di oggetto tramite costruttore
/*$acme = new Team('Acme', [
    'Erica',
    'Nicola'
]);*/
// Instanza di oggetto statica (il costruttore viene chiamato implicitamente dall'oggetto)
$acme = Team::start('Acme', [
    new Member('Erica'),
    new Member('Nicola'),
]);
var_dump($acme->name());
$acme->add(new Member('Chloe'));
var_dump($acme->members());