<?php

// Il principio dice che:
// "In un software, se S è un sottotipo di T, allora gli oggetti di tipo T devono poter essere sostituiti senza
// problemi con oggetti di tipo S senza alterare in nessun modo nessun aspetto e proprietà del software
// (correttezza, esecuzione dei task e così via)".

// Questo significa che se una classe A ha un metodo checkValue() che torna un booleano, nella mia classe B che estende
// se sovrascrivo il metodo checkValue() devo preoccuparmi di tornare lo stesso tipo di output quindi un booleano e non un qualsiasi altro tipo
// Questo mi permette in caso di sostituizione della classe di non rompere nulla.

class BaseClass {
    public function method1()
    {
        return true;
    }
    public function method2()
    {
        return 2;
    }
}

class SubClass extends BaseClass {
    public function specializedMethod()
    {
        return 'whatever';
    }

}

// La classe AlternativeSubClass rompe il LSP in quanto il method1() non torna più un booleano ma una stringa
class AlternativeSubClass extends BaseClass {
    public function specializedMethod()
    {
        return 'whatever';
    }
    public function method1()
    {
        return 'blablabla';
    }
}