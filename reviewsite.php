<?php
    /** Automatisch laden van header */
    include_once 'assets/autoloader.php';
    /** Templates met gebruik van includes **/
    include_once 'templates/navigation.php';
    include_once 'classes/Products.php';

    $fullURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <div class="current-container">
        <div class="invitation-message">
          <a href="writereview.php">
            <h2>Schrijf ook een review over onze website!</h2></a>
        </div>
        <div class="current-ratings-and-reviews">
          <h3>Reviews: <?php reviewCounterWebsite(); ?></h3> <br>
          <h4>Zeer goed: <?php zeergoedCounter(); ?></h4>
          <h4>Goed: <?php goedCounter(); ?></h4>
          <h4>Matig: <?php matigCounter(); ?></h4>
          <h4>Slecht: <?php slechtCounter(); ?></h4>
          <h4>Zeer slecht: <?php zeerslechtCounter(); ?></h4>
        </div>
      </div>

      <div class="reviews-on-site-container">
        <div class="reviews-on-site-content">
            <?php foreach (loadReviewsWebsite() as $value) {?>
                <div class="review">
                    <?php
                    $id = $value['reviewerID'];
                    $name = $value['name'];
                    $rating = $value['rating'];
                    $message = $value['message'];
                    $date = $value['date'];
                    ?>
                    <li><p><?php  echo $name  ?> - <?php  echo $rating  ?></p></li>
                    <li><p class="review-omschrijving">&#8220;<?php  echo $message  ?>&#8221;</p></li>
                    <li><p class="date-review"><?php  echo $date ?></p></li>
                </div>
            <?php } ?>
        </div>
      </div>
  <?php
    if (strpos($fullURL, "signup=success") == true) {
        print('<script>
                alert("Bedankt voor uw mening!");
              </script>');
    }
   ?>

  <?php
     include_once 'templates/footer.php';
  ?>
  </body>
</html>
