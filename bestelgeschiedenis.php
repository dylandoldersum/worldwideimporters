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
    <div class="header_ordergeschiedenis">
        <p>Bestelgeschiedenis</p>
    </div>
    <div class="product_ordergeschiedenis">
        <div class="item_ordergeschiedenis">
            <li><img src=assets/images/logo.png width='150' height='150'></li>
            <li>
                <h3>
                    <a>
                        <?php
                        $id= $_SESSION['logindata']['CustomerID'];

                        try {
                            if (mysqli_num_rows(bestelgeschiedenis($id)) == 0) {
                                echo "Geen oude bestellingen gevonden";
                            } else {
                                foreach (bestelgeschiedenis($id) as $value) {
                                    $stockitemname = $value['StockItemName'];
                                    $retailprice = $value['RecommendedRetailPrice'];
                                    echo $stockitemname; ?><br> €<?php echo $retailprice; ?><br><?php
                                }
                            }
                        }
                        catch (mysqli_sql_exception $e) {
                            return ($e);
                        }
                        ?>
                    </a>
                </h3>
            </li>
        </div>


    </div>


</div>
</body>
</html>


<?php
include_once 'templates/footer.php';
?>