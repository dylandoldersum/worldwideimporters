<?php

class Database
{
    private $host = 'localhost';
    private $dbName = 'wideworldimporters';
    private $user = 'root';
    private $password = '';
    protected $connection;


    public function connect()
    {
        try {
            $this->connection = mysqli_connect($this->host, $this->user, $this->password, $this->dbName);
            return true;
        } catch (Exception $e) {
            throw new mysqli_sql_exception($e);
            return false;
        }
    }
}