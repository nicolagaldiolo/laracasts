<?php
require 'vendor/autoload.php';
use Acme\TurkeySub;
use Acme\VeggieSub;

// Il template Method Pattern consiste nell'avere una sorta di template di classe definito in una classe astratta
// al fine di evere tutti i metodi comuni alle varie classi nella classe astratta e nelle varie classi avere solo i metodi che si differenziano.
// La classe astratta ha il metodo make() ma la particolarità è che il metodo make poi chiama il metodo addMainIngredient() che è un metodo astratto della
// classe astratta ma che viene dichiarato nelle classi specifiche così che quando viene chiamato il metodo make sulla classe viene ereditato tutto dalla classe astratta
// tranne il metodo addMainIngredient() che risiede nelle singole classi specializzate.

(new TurkeySub)->make();
(new VeggieSub)->make();