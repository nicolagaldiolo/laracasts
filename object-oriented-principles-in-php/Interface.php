<?php
// NewsletterProvider è un iterface, un contratto, che definisce il comportamento (metodi) che deve avere la classe che la implementerà
interface NewsletterProvider
{
    function subscribe($email);
}
class Mailchimp implements NewsletterProvider
{
    public function subscribe($email)
    {
        echo 'Subscribed with CampaignMonitor';
    }
}
class Drip implements NewsletterProvider
{
    public function subscribe($email)
    {
        echo 'Subscribed with Drip';
    }
}
class NewsletterSubscriptionsController
{
    // Il metodo store accetta un oggetto e chiama il metodo subscribe sull'oggetto passato Potrei fare il type hint dell'oggetto passato così
    // da sapere esattamente l'oggetto che mi arriva ma a quel punto accetterei solo un tipo di oggetto mentre posso ricevere Mailchimp o Drip
    // Quindi creo un interface e faccio il type hint dell'interface dicendo che accetto un qualsiasi oggetto che implementa quell'interfaccia
    public function store(NewsletterProvider $newsletter)
    {
        $email = 'email@example.com';
        $newsletter->subscribe($email);
    }
}

$controller = new NewsletterSubscriptionsController();
$controller->store(new Drip());
$controller->store(new Mailchimp());