<?php
/** Automatisch laden van header */
include_once 'assets/autoloader.php';

/** Templates met gebruik van includes **/
include_once 'templates/navigation.php';
$db = new Database();
$db->connect();

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<div class="products-container"

        <form action="" method=get>
          <select>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
            <input type="submit" value="GO" name="">
          </select>
        </form>

<?php
    $sql = "SELECT COUNT(*) FROM stockitems WHERE StockItemID IN
            (SELECT StockItemID FROM stockitemstockgroups WHERE StockGroupID = ".$_GET['CatID'].")";
     $result = mysqli_query($db->connection(), $sql);
     var_dump($result);
 ?>

<?php
$products->getProductsFromCategory();
?>

</div>

<?php
include_once 'templates/footer.php';
?>
  </body>
</html>
