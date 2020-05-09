<?php

Class QueryBuider
{
    protected $pdo;

    protected $dataClass;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table, $class)
    {
        $this->dataClass = $class;

        $statement = $this->pdo->prepare("select * from {$table}");

        $statement->execute();

        //return $statement->fetchAll(PDO::FETCH_OBJ); // Uso la classe standard
        return $statement->fetchAll(PDO::FETCH_CLASS, $this->dataClass); // dichiaro qual'è la classe che rappresenta il result set

    }
}