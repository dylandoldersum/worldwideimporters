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
          <li><a href="#">Lorem Ipsum</a>
            <ul>
              <li><a href="#">Penis</a></li>
              <li><a href="#">Penis</a></li>
              <li><a href="#">Penis</a></li>
            </ul>
          </li>
          <li><a href="#">Lorem Ipsum</a>
            <ul>
              <li><a href="#">Penis</a></li>
              <li><a href="#">Penis</a></li>
              <li><a href="#">Penis</a></li>
            </ul>
          </li>
          <li><a href="#">Lorem Ipsum</a>
            <ul>
              <li><a href="#">Penis</a></li>
              <li><a href="#">Penis</a></li>
              <li><a href="#">Penis</a></li>
            </ul>
          </li>
          <li><a href="#">Lorem Ipsum</a>
            <ul>
              <li><a href="#">Penis</a></li>
              <li><a href="#">Penis</a></li>
              <li><a href="#">Penis</a></li>
            </ul>
          </li>
          <li><a href="#">Lorem Ipsum</a>
            <ul>
              <li><a href="#">Penis</a></li>
              <li><a href="#">Penis</a></li>
              <li><a href="#">Penis</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
<?php

$sql = "SELECT StockGroupName FROM stockgroups";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    print("<ul>");
    while($row = mysqli_fetch_assoc($result)) {
        echo $row["StockGroupName"]. "<br>";
    }
    print("</ul>");
} else {
    echo "0 results";
}

mysqli_close($conn);


 ?>


  </body>
</html>
