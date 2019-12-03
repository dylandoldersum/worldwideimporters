<?php
/** Automatisch laden van header */
include_once 'assets/autoloader.php';

/** Templates met gebruik van includes **/
include_once 'templates/navigation.php';

?>

<body>
<div class="container_winkelwagen">
    <div class="header_winkelwagen">
        <p>Winkelwagen</p>
    </div>
    <div class="product_winkelwagen">
        <?php
        $TOTprice = 0;
        
        if (isset($_SESSION['itemID']) && isset($_GET['amountchange'])) {
            changeAmount();
        }
        if (isset($_GET['delete'])) {
            removeItemFromCart();
        }
        if (isset($_SESSION['itemID']) && !empty($_SESSION['itemID'])) {
            foreach ($_SESSION['itemID'] as $arrayitem) {
                ?>
                <div class="item-in-cart">
                    <li><img src=assets/images/SB.png width='150' height='150'></li>
                    <li><h3>
                            <a href="product-detail.php?itemID=<?php echo $arrayitem['code'] ?>"><?php echo $arrayitem['pname'] ?></a>
                        </h3></li>
                    <div class="quantity-items">
                        <li><a href="?itemId=<?php echo $arrayitem['code'] ?>&amountchange=plus">+</a></li>
                        <li class="quantity"><?php echo $arrayitem['quantity'] ?></li>
                        <li><a href="?itemId=<?php echo $arrayitem['code'] ?>&amountchange=min">-</a></li>
                    </div>
                    <li class="btw"><h3> btw: € <?php echo CalculateBTW($arrayitem['quantity']*$arrayitem['price']); ?></h3></li>
                    <li class="subtotaal"><h3> € <?php
                    $price = $arrayitem['quantity']*$arrayitem['price'];
                    $TOTprice += $price;
                    echo $price ?></h3></li>
                    <li class="delete-btn"><a class="delete-item"
                                              href="?itemId=<?php echo $arrayitem['code'] ?>&delete=true">X</a></li>
                    <li class="price-tag"><h3> € <?php echo $arrayitem['price'] ?></h3></li>
                </div>
                <?php
            }
        } else {
            echo '<h3>Winkelwagen is leeg</h3>';
        }
        ?>
    </div>

    <hr class="price-divider">
    <div class="AmountInCart">
        <span class="InCart">Aantal artikelen: <?php print Countcart() ?></span>
    </div>
    <div class="subtotal">
        <span class="Subtotaal-price">btw: &euro;<?php print CalculateBTW($TOTprice); ?></span>
        <span class="Subtotaal-price">Totaalprijs: &euro;<?php print $TOTprice; ?></span>
    </div>
    <div class="betaal-btn-container">
        <a class="betaal-btn" href="gegevens.php"> Verder naar bestellen </a>
    </div>
</div>

<?php
include_once 'templates/footer.php';
?>
</body>
</html>
