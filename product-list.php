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

$sql = "SELECT StockItemName, RecommendedRetailPrice, StockItemID, Photo FROM stockitems WHERE StockItemID IN
(SELECT StockItemID FROM stockitemstockgroups WHERE StockGroupID = " . $_GET['CatID'] . ")";
$result = mysqli_query($conn, $sql);

foreach ($result as $value) {
    $photo = $value['Photo'];
  $itemName = $value['StockItemName'];
  $price = $value['RecommendedRetailPrice'];
  $itemID = $value['StockItemID'];
  print("<a href='product-detail.php?itemID=$itemID'><div class='showProduct'>
    <img src='data:image/jpeg;base64,".base64_encode($photo)."' alt='#' width='160px', height='120px'>
    <p>" . $itemName . " -> " . $price . "</p>
    </div></a>");
}

?>

</div>

<?php
include_once 'templates/footer.php';
?>
  </body>
</html>
