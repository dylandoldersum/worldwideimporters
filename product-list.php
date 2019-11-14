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

<?php

$sql = "SELECT StockItemID FROM stockitemstockgroups /* WHERE stockgroups = " . $_GET['CatID'] */;
$result = mysqli_query($conn, $sql);

print($result);



?>




  </body>
</html>
