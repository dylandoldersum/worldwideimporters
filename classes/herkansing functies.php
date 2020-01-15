<?php
include_once 'assets/autoloader.php';
?>
<?php
function bestelgeschiedenis($id){
    $host = 'localhost';
    $dbName = 'wideworldimporters';
    $user = 'root';
    $password = '';
    $connection = mysqli_connect($host, $user, $password, $dbName);
    $sql = "SELECT S.StockItemName, S.RecommendedRetailPrice, S.StockItemID, G.StockGroupID FROM stockitems as S JOIN stockitemstockgroups as G ON S.StockItemID = G.StockItemStockGroupID  
            WHERE S.StockItemID IN 
            (SELECT StockItemID FROM orderline1 WHERE orderID IN 
            (SELECT orderID FROM order1 WHERE CustomerID=".$id."))";

    $result = mysqli_query($connection, $sql);
    return $result;

}

