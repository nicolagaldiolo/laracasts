<?php

interface EngineVeichleInterface {

    public function turnOn();
    public function turnOff();

}

interface BasicVeichleInterface {

    public function accelerate();
    public function brake();

}

interface LightsVeichleInterface {

    public function lightsOn();
    public function lightsOff();

}

interface RadioVeichleInterface {

    public function radioOn();
    public function radioOff();
    public function switchToUsbMusic();
    public function switchToRadioMusic();

}

interface FlyingVeichleInterface {

    public function takeOff();
    public function land();
    public function flySensorsCheck();

}

class OldCar implements
    EngineVeichleInterface,
    BasicVeichleInterface,
    LightsVeichleInterface {

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

    public function brake()
    {
        // implemento il metodo...
    }

    public function lightsOn()
    {
        // implemento il metodo...
    }

    public function lightsOff()
    {
        // implemento il metodo...
    }

}