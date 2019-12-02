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
        foreach (loadProductsWinkel() as $loop) {
            foreach ($loop as $product) {
                ?>
                <div class='item-in-cart'>
                    <li><img src=assets/images/SB.png width='150' height='150'></li>
                    <li><h3><br>
                            <a href="product-detail.php?itemID=<?php echo $product['StockItemID'] ?>"><?php echo $product['StockItemName'] ?></a>
                        </h3></li>
                    <li class='numbering'>
                        <form action='winkelwagen.php' method='post'><input value='1' min='1' type='number'><input
                                    type='submit' name='amountUpDown'></form>
                    </li>
                    <li class='delete-btn'><input class='taf' value='x' type='submit'></li>
                    <li><h3> € <? echo $product['RecommendedRetailPrice'] ?> </h3></li>
                </div>
                <?php
            }
        }
        ?>
    </div>

    <hr class="price-divider">
    <div class="AmountInCart">
        <span class="InCart">Aantal artikelen: <?php print Countcart() ?></span>
    </div>
    <div class="subtotal">
        <span class="subtotaal-price">Subtotaalprijs: &euro;<?php print subTotaal(); ?></span>
    </div>
    <div class="betaal-btn-container">
        <a class="betaal-btn" href="gegevens.php"> Verder naar bestellen </a>
    </div>
</div>
</div>

<?php
include_once 'templates/footer.php';
?>
</body>
</html>
