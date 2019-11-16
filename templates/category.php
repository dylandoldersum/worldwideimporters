<div class="category-container">
      <nav class="category-bar">
        <ul>
        <?php
        $products->getCategoriesForNavigation();

//        $sql = "SELECT StockGroupName, StockGroupID FROM stockgroups";
//        $result = mysqli_query($conn, $sql);
//
//        foreach ($result as $value) {
//          $catID = $value['StockGroupID'];
//          print("<li><a href='product-list.php?CatID=$catID'> ". $value['StockGroupName'] . "</a></li>");
//
//        }

         ?>
        </ul>
      </nav>
</div>
