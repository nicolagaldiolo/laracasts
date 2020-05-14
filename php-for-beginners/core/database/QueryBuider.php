<?php
namespace Core\Database;
use \PDO;
Class QueryBuider
{
    protected $pdo;
    protected $dataClass;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function selectAll($table, $class = null)
    {
        $this->dataClass = $class;
        $statement = $this->pdo->prepare("select * from {$table}");
        $statement->execute();
        //return $statement->fetchAll(PDO::FETCH_OBJ); // Uso la classe standard
        //return $statement->fetchAll(PDO::FETCH_CLASS, $this->dataClass); // dichiaro qual'è la classe che rappresenta il result set
        $data = ($this->dataClass) ?
            $statement->fetchAll(PDO::FETCH_CLASS, $this->dataClass) :
            $statement->fetchAll(PDO::FETCH_CLASS);
        return $data; // dichiaro qual'è la classe che rappresenta il result set
    }
    public function insert($table, $parameters)
    {
        try {
            $sql = sprintf(
                'INSERT INTO %s (%s) VALUES(%s)',
                $table,
                implode(', ', array_keys($parameters)),
                ':' . implode(array_keys($parameters), ', :')
            );
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        }catch (PDOException $e){
            die($e->getMessage());
            //die("Something was wrong");
        }
    }
}