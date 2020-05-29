<?php

// Publisher
interface Subject {
    public function attach($observer);
    public function detach($observer);
    public function notify();
}

// Subscriber
interface Observer {
    public function handle();
}

class Login implements Subject {
    protected $observers = [];

    public function attach($observable) // funziona sia se passo array, sia se passo istanza di oggetto
    {
        if(is_array($observable)){
            return $this->attachObservers($observable);
        }
        $this->observers[] = $observable;
        return $this;
    }

    private function attachObservers($observable)
    {
        foreach ($observable as $observer){
            if(!$observer instanceof Observer) {
                throw new Exception;
            }
            $this->attach($observer);
        }
    }

    public function fire()
    {
        //perform the login
        $this->notify();
    }

    public function detach($index){
        unset($this->observers[$index]);
    }
    public function notify(){
        foreach ($this->observers as $observer){
            $observer->handle();
        }
    }
}

class LogHandler implements Observer{
    public function handle(){
        var_dump('Log something important');
    }
}

class EmailNotifier implements Observer{
    public function handle(){
        var_dump('Fire off an email');
    }
}

class DatabaseNotifier implements Observer{
    public function handle(){
        var_dump('Log on database');
    }
}

$login = new Login;
$login->attach([
    new LogHandler,
    new EmailNotifier
]);
$login->attach(new DatabaseNotifier);

$login->fire();