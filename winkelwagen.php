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
        $_SESSION['TOT'] = 0;

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
                    <li><img src=assets/images/logo.png width='150' height='150'></li>
                    <li><h3>
                            <a href="product-detail.php?itemID=<?php echo $arrayitem['code'] ?>&CatID=<?php echo $arrayitem['catid'] ?>"><?php echo $arrayitem['pname'] ?></a>
                        </h3></li>
                    <div class="quantity-items">
                        <li><a href="?itemId=<?php echo $arrayitem['code'] ?>&amountchange=plus">+</a></li>
                        <li class="quantity"><?php echo $arrayitem['quantity'] ?></li>
                        <li><a href="?itemId=<?php echo $arrayitem['code'] ?>&amountchange=min">-</a></li>
                    </div>
                    <div class="btw-price">
                        <li class="btw"><h3> btw:
                                € <?php echo CalculateBTW($arrayitem['quantity'] * $arrayitem['price']); ?></h3></li>
                        <li class="subtotaal"><h3>Subtotaal: € <?php
                                $price = $arrayitem['quantity'] * $arrayitem['price'];
                                $_SESSION['TOT'] += $price;
                                echo $price ?></h3></li>
                    </div>
                    <li class="delete-btn"><a class="delete-item"
                                              href="?itemId=<?php echo $arrayitem['code'] ?>&delete=true">X</a></li>
                    <li class="price-tag"><h3> € <?php echo $arrayitem['price'] ?> per stuk</h3></li>
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
        <span class="Subtotaal-price">btw: &euro;<?php print CalculateBTW($_SESSION['TOT']); ?></span>
        <span class="Subtotaal-price">Totaalprijs: &euro;<?php print $_SESSION['TOT']; ?></span>
    </div>
    <div class="betaal-btn-container">
      <?php
      if (isset($_SESSION['itemID']) && count($_SESSION['itemID'])>0) {
      ?>
        <a class="betaal-btn" href="gegevens.php"> Verder naar bestellen </a>
      <?php
    }
      else{
        ?>
        <a class="betaal-btn" href="index.php" > Verder winkelen </a>
      <?php
    }
      ?>
    </div>
</div>

<?php
include_once 'templates/footer.php';
?>
</body>
</html>
