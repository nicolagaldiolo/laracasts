<?php

class Subscription
{
    protected $gateway;
    public function __construct(Gateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function create()
    {
        return $this->gateway->getSubscription();
    }
    public function cancel()
    {
    }
    public function invoice()
    {
    }
    public function swap($newPlan)
    {
    }
}
interface Gateway
{
    public function __construct($user);
    public function findCustomer();
    public function findSubscriptionByCustomer();
    public function getSubscription();
}

class StripeGateway implements Gateway
{
    protected $user;
    protected $customer;
    protected $subscription;
    public function __construct($user)
    {
        $this->user = $user;
        $this->customer = $this->findCustomer();
    }
    public function findCustomer()
    {
        if($this->user){
            return $this->customer = 'CUSTXYZ';
        }
    }
    public function findSubscriptionByCustomer()
    {
        if($this->customer){
            return $this->subscription = 'SUBXYZ';
        }
    }
    public function getSubscription()
    {
        $this->findSubscriptionByCustomer();
        return $this->subscription;
    }
}
class PaypalGateway implements Gateway
{
    protected $user;
    protected $customer;
    protected $subscription;
    public function __construct($user)
    {
        $this->user = $user;
        $this->customer = $this->findCustomer();
    }
    public function findCustomer()
    {
        if($this->user){
            return $this->customer = 'CUSTXYZ';
        }
    }
    public function findSubscriptionByCustomer()
    {
        if($this->customer){
            return $this->subscription = 'SUBXYZ';
        }
    }
    public function getSubscription()
    {
        $this->findSubscriptionByCustomer();
        return $this->subscription;
    }
}
$user = 1;
$gateway = new StripeGateway(1);
$subscription = new Subscription($gateway);
var_dump($subscription->create());
