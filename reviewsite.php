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

      <div class="invitation-container">
        <div class="invitation-message">
          <a href="writereview.php"><h2>Schrijf ook een review over onze website!</h2></a>
        </div>
      </div>

      <div class="current-container">
        <div class="current-ratings-and-reviews">
          <h3>Reviews: </h3> <br>
          <h4>Zeer goed: </h4>
          <h4>Goed: </h4>
          <h4>Matig: </h4>
          <h4>Slecht: </h4>
          <h4>Zeer slecht: </h4>
        </div>
      </div>

  <?php
     include_once 'templates/footer.php';
  ?>
  </body>
</html>