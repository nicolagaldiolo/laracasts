<?php

// La classe SalesReporter ha troppe responsabilità,
// deve preoccuparsi dell'autenticazione
// deve preoccuparsi di implementare la logica con cui estrarre i dati a db
// deve preoccuparsi di formattare l'output

class SalesReporter
{
    public function between($startDate, $endDate)
    {
        // Perform Auth
        //if( !Auth::check() ) throw new Exception('Authentication required');

        // get sales from db
        $sales = $this->queryDBForSalesBetween($startDate, $endDate);

        return $this->format($sales);
    }

    private function format($sales)
    {
        return "<h2>{$sales}</h2>";
    }

    private function queryDBForSalesBetween($startDate, $endDate)
    {
        //return DB::table('sales')->whereBetween('created_at', [$startDate, $endDate])->sum('charge') / 100;
        return 100.45;
    }
}

$report = new SalesReporter;
echo $report->between('oggi', 'ieri');