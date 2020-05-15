<?php

class TeamException extends Exception
{
    public static function fromTooManyMembers()
    {
        return new static("Max members reached");
    }
}
class MaximumMembersReached extends Exception
{
    protected $message = "Max members reached";
}

class Member
{
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
}
class Team
{
    protected $maxMember = 3;
    protected $members = [];
    public function add(Member $member)
    {
        if(count($this->members) === $this->maxMember){
            //throw new Exception("Max members reached"); // Lancio eccezione generica built-in
            //throw new MaximumMembersReached("Custom message Max members reached"); // Lancio eccezione custom passando il messaggio
            //throw new MaximumMembersReached; // Lancio eccezione custom utilizzando il messaggio predefinito
            throw TeamException::fromTooManyMembers();
        }
        $this->members[] = $member;
    }
}

try {
    $team = new Team();
    $team->add(new Member('Nicola'));
    $team->add(new Member('Erica'));
    $team->add(new Member('Chloe'));
    $team->add(new Member('Minni'));
// Posso sollevare diversi tipi di eccezzione e effettuare operazioni diverse a seconda dell'eccezzione sollevata
}catch (MaximumMembersReached $e){
    var_dump($e->getMessage());
}catch (InvalidArgumentException $e){
    var_dump($e->getMessage());
}catch (Exception $e){
    var_dump($e->getMessage());
} finally {
    // Codice da eseguire ogni volta a prescindere
}