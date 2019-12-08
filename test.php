<?php

    $host = 'localhost';
    $dbName = 'wideworldimporters';
    $user = 'root';
    $password = '';
    $connection = mysqli_connect($host, $user, $password, $dbName);

    $sql_insert = "INSERT INTO sitereviews (name, rating, message) VALUES ('Hans', 'Zeer goed', 'Simpelweg geweldig!')";
    $result = mysqli_query($connection, $sql_insert);

    if (!mysqli_query($result, $sql_insert)) {
      die ("Error");
    } else {
      print("Success");
    }

 ?>
