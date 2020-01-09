<?php

function bestelgeschiedenis(){
    $host = 'localhost';
    $dbName = 'wideworldimporters';
    $user = 'root';
    $password = '';
    $connection = mysqli_connect($host, $user, $password, $dbName);
    $sql = "SELECT StockItemName, RecommendedRetailPrice Photo FROM stockitems WHERE StockitemID IN 
            (SELECT stockitemID FROM orderline1 WHERE orderID IN 
            (SELECT orderID FROM order1 WHERE CustomerID =".$_SESSION['CustomerID']"))
";

}
