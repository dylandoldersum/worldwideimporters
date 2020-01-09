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
<?php foreach(bestelgeschiedenis() as $value) { ?>

    <?php
    $productname = $value['StockItemName'];
    $retailprice = $value['RecommendedRetailPrice'];
    $CustomerID = $value['CustomerID'];




}?>
<?php var_dump($_SESSION);  ?>
<div class="container_ordergeschiedenis">

</div>
</body>
</html>


<?php
include_once 'templates/footer.php';
?>