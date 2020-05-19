<?php
namespace Acme;
class TurkeySub extends Sub
{
    protected function addMainIngredient()
    {
        var_dump('add Turkey');
        return $this;
    }
}