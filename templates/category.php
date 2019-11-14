<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

  </head>
  <body>
    <div class="category-container">
      <nav class="category-bar">
        <ul>

        <?php

        $sql = "SELECT StockGroupName, StockGroupID FROM stockgroups";
        $result = mysqli_query($conn, $sql);

        foreach ($result as $value) {
          $url = $value['StockGroupName'];
          $catID = $value['StockGroupID'];
          print("<li><a href='product-list.php?CatID=$catID'> ". $value['StockGroupName'] . "</a></li>");

        }

        mysqli_close($conn);


         ?>

        </ul>
      </nav>
    </div>



  </body>
</html>
