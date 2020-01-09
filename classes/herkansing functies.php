<?php

function bestelgeschiedenis(){
    $host = 'localhost';
    $dbName = 'wideworldimporters';
    $user = 'root';
    $password = '';
    $connection = mysqli_connect($host, $user, $password, $dbName);
    $sql = "SELECT stockitems.StockItemName, stockitems.RecommendedRetailPrice stockitems.Photo FROM stockitems";

}
