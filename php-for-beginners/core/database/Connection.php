<?php
    namespace Core\Database;
    Class Connection
    {
        static function make($config)
        {
            try{
                return new \PDO('mysql:host=' . $config['host'] . ';dbname=' .
                    $config['name'],
                    $config['username'],
                    $config['password'],
                    $config['options']
                );
            }catch(\PDOException $e) {
                die($e->getMessage());
            }
        }
    }