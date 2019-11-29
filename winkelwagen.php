<?php
/** Automatisch laden van header */
include_once 'assets/autoloader.php';

/** Templates met gebruik van includes **/
include_once 'templates/navigation.php';
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="assets/css/stylesheet.css">
  </head>
  <body>

    <div class="container_winkelwagen">
      <div class="header_winkelwagen">
        <p>Winkelwagen</p>
      </div>
      <div class="product_winkelwagen">
        <?php
            loadProductsWinkel();
         ?>
          <hr class="price-divider">
          <div class="amount">
              <span class="aantal">Aantal artikelen: <?php print Countcart()?></span>
          </div>
         <div class="subtotal">
             <span class="subtotaal-price">Subtotaalprijs: &euro;<?php print subTotaal(); ?></span>
         </div>
          <div class="betaal-btn-container">
              <a class="betaal-btn" href="betalen.php">Afrekenen</a>
          </div>
      </div>
    </div>

    <?php
      include_once 'templates/footer.php';
     ?>
  </body>
</html>
