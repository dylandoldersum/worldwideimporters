<?php
/** Automatisch laden van header */
include_once 'assets/autoloader.php';

/** Templates met gebruik van includes **/
include_once 'templates/navigation.php';
include_once 'classes/Products.php';


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


<?php /////////////////////////Item Amount Selection Per Page///////////////////
$dbName = 'wideworldimporters';
$user = 'root';
$password = '';
$connection = mysqli_connect($host, $user, $password, $dbName);

   $sql = "SELECT COUNT(*) FROM stockitems WHERE StockItemID IN
            (SELECT StockItemID FROM stockitemstockgroups WHERE StockGroupID = 1)";
    $result = mysqli_query($connection, $sql);

     foreach ($result as $item) {
         echo $total_items = $item["COUNT(*)"];
     }

     $results_per_page = 25;
     echo $number_of_pages = ceil($total_items / $results_per_page);

     for ($page = 1; $page <= $number_of_pages; $page++) {
       echo '<a href="testv1.php?page=' . $page . '" class="pagination">' . $page .  '</a>';
     }

 /////////////End/////////////////////////////////////?>

<?php
getProductsFromCategory();
?>

</div>

<?php
include_once 'templates/footer.php';
?>
  </body>
</html>
