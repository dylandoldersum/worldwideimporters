<?php

include_once 'assets/autoloader.php';
include_once 'templates/navigation.php';
include_once 'classes/herkansing functies.php';
include_once 'bestelgeschiedenis.php';

If (!isset($_SESSION['loggedin'])){
    header('location: index.php');
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>KBS</title>
</head>
<body>
<div class="container_ordergeschiedenis">

<?php
$id= $_SESSION['logindata']['CustomerID'];
foreach (bestelgeschiedenis($id) as $value) {
    $stockitemname = $value['StockItemName'];
    $retailprice = $value['RecommendedRetailPrice'];
    if (mysqli_num_rows($result) == 0) {
        echo "Geen oude bestellingen gevonden";
    }
    else {
        echo $stockitemname;?><br> €<?php echo $retailprice;?><br><?php }
    }
?>

</div>
</body>
</html>


<?php
include_once 'templates/footer.php';
?>