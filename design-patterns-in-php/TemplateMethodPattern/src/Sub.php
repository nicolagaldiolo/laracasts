<?php

namespace Acme;

abstract class Sub
{
    public function make()
    {
        return $this->layBread()
            ->addLettuce()
            ->addMainIngredient()
            ->addSauces();
    }
    protected function layBread()
    {
        var_dump('lay Bread');
        return $this;
    }
    protected function addLettuce()
    {
        var_dump('add Lettuce');
        return $this;
    }
    protected function addSauces()
    {
        var_dump('add Sauces');
        return $this;
    }
    abstract protected function addMainIngredient();
}