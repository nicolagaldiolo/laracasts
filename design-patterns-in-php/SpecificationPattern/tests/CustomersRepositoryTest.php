<?php

// TO run tests: https://laracasts.com/discuss/channels/general-discussion/phpunit-command-not-found-1
// vendor/bin/phpunit --colors tests

use PHPUnit\Framework\TestCase;
use Illuminate\Database\Capsule\Manager as Capsule;
class CustomersRepositoryTest extends TestCase
{
    public $customers;
    public function setUp() : void
    {
        $this->setUpDatabase();
        $this->migrateTables();

        $this->customers = new CustomersRepository;
    }

    protected function setUpDatabase()
    {
        $capsule = new Capsule;
        $capsule->addConnection([
            'driver' => 'sqlite',
            'database' => ':memory:'
        ]);

        $capsule->bootEloquent();
        $capsule->setAsGlobal();
    }
    protected function migrateTables()
    {
        Capsule::schema()->create('customers', function($table){
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->timestamps();
        });

        Customer::create(['name' => 'Joe', 'type' => 'gold']);
        Customer::create(['name' => 'Jane', 'type' => 'silver']);
    }


    function testFetchesAllCustomersWhoMatchGiverSpecification()
    {
        $results = $this->customers->matchingSpecification(new CustomerIsGold);

        $this->assertCount(1, $results);
    }

    function testFetchesAllCustomers()
    {
        $results = $this->customers->all();

        $this->assertCount(2, $results);
    }
}