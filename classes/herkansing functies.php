<?php
include_once 'assets/autoloader.php';
?>
<?php
function bestelgeschiedenis(){
    $host = 'localhost';
    $dbName = 'wideworldimporters';
    $user = 'root';
    $password = '';
    $connection = mysqli_connect($host, $user, $password, $dbName);
    $sql = "SELECT StockItemName, RecommendedRetailPrice FROM stockitems WHERE StockItemID IN 
            (SELECT StockItemID FROM orderline1 WHERE orderID IN 

            (SELECT orderID FROM order1 WHERE CustomerID =".$_SESSION["CustomerID"];


    $result = mysqli_query($connection, $sql);
    return $result;

}

