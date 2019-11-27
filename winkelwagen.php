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
            getProductsFromID(2);
         ?>
      </div>
    </div>

    <?php
      include_once 'templates/footer.php';
     ?>
  </body>
</html>
