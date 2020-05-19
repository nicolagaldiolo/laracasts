<?php
namespace Acme;
class VeggieSub extends Sub
{
    protected function addMainIngredient()
    {
        var_dump('add Veggie');
        return $this;
    }
}