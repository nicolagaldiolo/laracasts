<?php

// Nessuna classe dovrebbe essere forzato a dipendere da metodi che non usa.
// L'interfaccia VeichleInterface implementa tutti i metodi possibili immaginabili associabili ad un veicolo ma la classe
// TeslaVeichle dovrebbe implementare solo i metodi legati alle automobili
// quindi il segreto è spaccare l'interfaccia VeichleInterface in tante interfaccie più piccole

interface VeichleInterface {

    public function turnOn();
    public function turnOff();

    public function accelerate();
    public function brake();

    public function lightsOn();
    public function lightsOff();

    public function radioOn();
    public function radioOff();
    public function switchToUsbMusic();
    public function switchToRadioMusic();

    // metodi aggiunti per il volo...
    public function takeOff();
    public function land();
    public function sensorsCheck();

}

class TeslaVeichle implements VeichleInterface {

    public function turnOn()
    {
        // implemento il metodo...
    }

    public function turnOff()
    {
        // implemento il metodo...
    }

    public function accelerate()
    {
        // implemento il metodo...
    }

    // implemento tutti i metodi richiesti dall'interfaccia...

    public function switchToRadioMusic()
    {
        // implemento il metodo...
    }

}