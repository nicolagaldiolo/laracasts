<?php
//require 'vendor/autoload.php';
// Lo Strategy Pattern definisce una famiglia di Algoritmi/Task incapsulati tra di loro e resi intercambiabili, es: il log
// Il log può essere fatto su file|database|servizio esterno es: slack.
// Ci sono una serie di classi che definiscono ognuno di questi metodi e attraverso la configurazione è possibile scegliere uno o l'altro ma l'interfaccia
// esposta sarà sempre la stessa es: App::log()

interface Logger
{
    public function log($data);
}

class LogToFile implements Logger
{
    public function log($data)
    {
        var_dump('Log the data to a file');
    }
}

class LogToDatabase implements Logger
{
    public function log($data)
    {
        var_dump('Log the data to database');
    }
}

class LogToXWebService implements Logger
{
    public function log($data)
    {
        var_dump('Log the data to a WebService');
    }
}

class App {
    public function log($data, Logger $logger = null)
    {
        $logger = $logger ?: new LogToFile;
        $logger->log($data);
    }
}

(new App())->log('data to log');
(new App())->log('data to log', new LogToDatabase);
(new App())->log('data to log', new LogToXWebService);