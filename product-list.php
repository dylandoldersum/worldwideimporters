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
//$sql = "SELECT StockItemName, RecommendedRetailPrice, StockItemID, Photo FROM stockitems WHERE StockItemID IN
//(SELECT StockItemID FROM stockitemstockgroups WHERE StockGroupID = " . $_GET['CatID'] . ")";
//$result = mysqli_query($conn, $sql);
//$count = 0;
//
//foreach ($result as $value) {
//  $itemName = $value['StockItemName'];
//  $price = $value['RecommendedRetailPrice'];
//  $itemID = $value['StockItemID'];
//  $photo = $value['Photo'];
//  $count++;
//
//  if($photo === ""){
//    $source = "assets/images/logo.png";
//  } else {
//    $source = "data:image/jpeg;base64,".base64_encode($photo);
//  }
//
//  print("<a href='product-detail.php?itemID=$itemID'><div class='showProduct'>
//    <h3 class='product_text'>$itemName</h3>
//    <img class='product_photo' src='". $source . "' alt='#' width='80%', height='200px'>
//    <p class='product_text'>PRICE: €$price</p>
//    </div></a>");
//
//    if($count === 25){
//      break;
//    }
//}

?>
<form action="product-list.php?CatID=$catID" method="get">
  <input type="submit" value="25" name="25">
</form>

</div>

<?php
include_once 'templates/footer.php';
?>
  </body>
</html>
