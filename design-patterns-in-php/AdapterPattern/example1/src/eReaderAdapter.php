<?php

namespace Acme;

class eReaderAdapter implements BookInterface
{
    private $reader;
    public function __construct(eReaderInterface $reader)
    {
        $this->kindle = $reader;
    }
    public function open()
    {
        $this->kindle->turnOn();
    }
    public function turnPage()
    {
        $this->kindle->pressNextButton();
    }
}