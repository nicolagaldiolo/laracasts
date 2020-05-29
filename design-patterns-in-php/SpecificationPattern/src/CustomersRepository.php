<?php

class CustomersRepository
{
    protected $items;

    public function matchingSpecification(CustomerIsGold $specification)
    {
        $customers = Customer::query();
        $customers = $specification->asScope($customers);
        return $customers->get();
    }

    public function all()
    {
        return Customer::all();
    }
}
