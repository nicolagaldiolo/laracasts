<?php

// TO run tests: https://laracasts.com/discuss/channels/general-discussion/phpunit-command-not-found-1
// vendor/bin/phpunit --colors tests

use PHPUnit\Framework\TestCase;
class CustomerIsGoldTest extends TestCase
{
    function testThatCustomerIsGoldIfTheyHaveTheRespectiveType()
    {
        $specification = new CustomerIsGold;
        $goldCustomer = new Customer(['type' => 'gold']);
        $silverCustomer = new Customer(['type' => 'silver']);
        $this->assertTrue($specification->isSatisfiedBy($goldCustomer));
        $this->assertFalse($specification->isSatisfiedBy($silverCustomer));
    }
}