<?php

// il metodo begin non necessita di essere toccato quando viene implementato un nuovo metodo di pagamento

interface PaymentMethod {
    public function pay();
}

class CashPaymentMethod implements PaymentMethod {
    public function pay()
    {
        var_dump('Stai pagando con cash');
    }
}

class BankPaymentMethod implements PaymentMethod {
    public function pay()
    {
        var_dump('Stai pagando con bonifico');
    }
}

class PayPalPaymentMethod implements PaymentMethod {
    public function pay()
    {
        var_dump('Stai pagando con PayPal');
    }
}

class Checkout {
    public function begin($receipt, PaymentMethod $method)
    {
        return $method->pay();
    }
}

(new Checkout)->begin('', new BankPaymentMethod);