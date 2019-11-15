<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  <div class="indexbody">
    <p class="body-p">Neem een kijkje door onze Favorieten!</p>

    <?php
      $sql = "SELECT StockItemName, RecommendedRetailPrice FROM stockitems
              WHERE StockItemID = 2 OR StockItemID = 23";
      $result = mysqli_query($conn, $sql);

      foreach ($result as $value) {
        $itemName = $value['StockItemName'];
        print("<a href=''><div class='favorites'>" . $itemName . "</a></div>");
      }
     ?>

  </div>

  </body>
</html>
