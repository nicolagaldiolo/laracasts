<?php
// VALUE OBJECTS
// ValueObject sono utili talvolta per lavorare con i valori, es: age, quando istanzio age ho la certezza che sia un età valida.
// Potrei fare lo stesso per un oggetto EmailAddress, Password, Data di partenza e arrivo, delle coordinate o alcuni valori che devono andare insieme es:
// function (int x, int y){} // in questo caso mi devo preoccupare all'interno della funzione se le coordinate sono valide, inceve se passo alla funzione
// un oggetto potrei averne già controllato la validaità

// MUTABILITY
// Lo stato degli oggetti può essere mutabile o immutabile
// Se le proprietà dell'oggetto sono mutabili lavoro sempre sulla stessa istanza di oggetto
// Se le proprietà dell'oggetto sono immutabili e NON lavoro sempre sulla stessa istanza di oggetto
class AgeMutable // Oggetto mutabile
{
    private $age;
    function __construct(int $age)
    {
        $this->checkValidationValue($age);
        $this->age = $age;
    }
    public function increment()
    {
        $newValue = $this->age +1;
        $this->checkValidationValue($newValue);
        $this->age = $newValue;
    }
    public function getAge()
    {
        return $this->age;
    }
    private function checkValidationValue($age)
    {
        if($age < 0 || $age > 120){
            throw new InvalidArgumentException("L'età deve essere compresa tra 0 e 120. Valore inserito: {$age}");
        }
    }
}
class AgeImmutable // Oggetto immutabile
{
    private $age;
    function __construct(int $age)
    {
        if($age < 0 || $age > 120){
            throw new InvalidArgumentException("L'età deve essere compresa tra 0 e 120. Valore inserito: {$age}");
        }
        $this->age = $age;
    }
    public function increment()
    {
        return new self($this->age + 1);
    }
    public function getAge()
    {
        return $this->age;
    }
}
function register($email, Age $age)
{
}
// Oggetto Mutabile
$age = new AgeMutable(34);
$age->increment();
var_dump($age->getAge());

// Oggetto Immutabile
$age2 = new AgeImmutable(34);
$age2New = $age2->increment(); // Mi viene tornata una nuova istanza di oggetto e se la voglio la devo riassegnare infatti increment non
// incrementa l'oggetto iniziale ma ne torna uno nuovo con il lavore incremenetato. A questo punto il controllo di validità
// lo posso lasciare nel costruttore dell'oggetto
var_dump($age2->getAge());
var_dump($age2New->getAge());
