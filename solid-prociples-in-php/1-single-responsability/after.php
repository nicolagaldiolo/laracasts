<?php

// La classe SalesReporter ora ha solo la responsabilità per cui è stata pensata:
// NON si deve deve preoccupare dell'autenticazione perchè gestita ancora prima di arrivare a questa classe
// NON si deve preoccupare di implementare la logica con cui estrarre i dati a db perchè delegata ad una classe apposita (SalesRepository)
// NON si deve preoccupare di formattare l'output in quanto è stata creata una classe apposita, con il vantaggio che se anzichè tornare dell'html
// ho bisogni di JSON mi basta creare una classe JSONOutput e passare un'instanza di essa quando chiamo il metodo between

class SalesRepository
{
    public function between($startDate, $endDate)
    {
        //return DB::table('sales')->whereBetween('created_at', [$startDate, $endDate])->sum('charge') / 100;
        return 100.45;
    }
}

interface SalesOutputInterface {
    public function output($sales);
}

class HtmlOutput implements SalesOutputInterface
{

    public function output($sales)
    {
        return "<h2>{$sales}</h2>";
    }
}

class SalesReporter
{
    /**
     * @var SalesRepository
     */
    private $repo;

    public function __construct(SalesRepository $repo)
    {
        $this->repo = $repo;
    }

    public function between($startDate, $endDate, SalesOutputInterface $formatter)
    {
        // get sales from db
        $sales = $this->repo->between($startDate, $endDate);

        return $formatter->output($sales);
    }
}

$report = new SalesReporter(new SalesRepository);
echo $report->between('oggi', 'ieri', new HtmlOutput);