<?php

  $host = 'localhost';
  $dbName = 'wideworldimporters';
  $user = 'root';
  $password = '';

        try {
            $connection = mysqli_connect($host, $user, $password, $dbName);
            return true;
        } catch (Exception $e) {
            throw new mysqli_sql_exception($e);
            return false;
        }
  

?>
