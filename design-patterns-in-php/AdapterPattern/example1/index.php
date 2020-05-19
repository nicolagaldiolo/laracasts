<?php

require 'vendor/autoload.php';
use Acme\Book;
use Acme\Kindle;
use Acme\Nook;
use Acme\BookInterface;
use Acme\eReaderAdapter;

class Person {
    public function read(BookInterface $book)
    {
        $book->open();
        $book->turnPage();
    }
}

// Un adapter permette di tradurre un interfaccia per essere compatibile con un altra
// Se ho un oggetto con interfaccia A che deve essere compatibile con un oggetto con un interfaccia B occorre creare un adapter
// Per creare un adapter occorre creare un oggetto Adapter che implementa l'interfaccia A, nel suo costruttore si inietta un oggetto che implementa
// l'interfaccia B e si mappano i metodi dell'interfaccia B sui metodi dell'interfaccia A
(new Person())->read(new Book);
(new Person())->read(new eReaderAdapter(new Kindle));
(new Person())->read(new eReaderAdapter(new Nook));

