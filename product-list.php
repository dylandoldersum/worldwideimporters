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
  </head>
  <body>
<div class="products-container">

<?php
$products->getProductsFromCategory();
?>

</div>

<?php
include_once 'templates/footer.php';
?>
  </body>
</html>
