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

        $sql = "SELECT StockGroupName FROM stockgroups";
        $result = mysqli_query($conn, $sql);

        foreach ($result as $value) {
          print("<li><a href='#'> ". $value['StockGroupName'] . "</a>
            <ul>
              <li><a href='#'>Penis</a></li>
              <li><a href='#'>Penis</a></li>
              <li><a href='#'>Penis</a></li>
            </ul>
          </li>");

        }

        mysqli_close($conn);


         ?>

        </ul>
      </nav>
    </div>



  </body>
</html>
