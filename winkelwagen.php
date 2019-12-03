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
        print_r($_SESSION['itemID']);
        if (isset($_SESSION['itemID']) && !empty($_SESSION['itemID'])) {
            foreach (loadProductsWinkel() as $loop) {
                foreach ($loop as $product => $item) {
                    if (isset($_GET['itemId'])) {
                        removeItemFromCart();
                    }
                    ?>
                    <div class="item-in-cart">
                        <li><img src=assets/images/SB.png width='150' height='150'></li>
                        <li><h3>
                                <a href="product-detail.php?itemID=<?php echo $item['StockItemID'] ?>"><?php echo $item['StockItemName'] ?></a>
                            </h3></li>
                        <li class="numbering"><input type="number" min="1" value="1"></li>
                        <li class="delete-btn"><a href="?itemId=<?php echo $item['StockItemID'] ?>">X</a></li>
                        <li><h3> € <? echo $item['RecommendedRetailPrice'] ?> </h3></li>
                    </div>
                    <?php
                }
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
        <span class="subtotaal-price">Subtotaalprijs: &euro;<?php print subTotaal(); ?></span>
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
