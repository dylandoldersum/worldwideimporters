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

    <div class="form-review-container">
      <div class="form-review-content">
       <form class="" action="error_handler_review.php" method="post">
         <span>Wat is je voornaam?</span> <br>
         <input type="text" name="naam" value=""> <br><br>
         <span>Wat geef je als beoordeling?</span> <br>
         <select name="beoordeling">
         <option value="Zeer goed">Zeer goed</option> <span> Zeer goed</span> <br>
         <option value="Goed">Goed</option> <span> Goed</span> <br>
         <option value="Matig">Matig</option> <span> Matig</span> <br>
         <option value="Slecht">Slecht</option> <span> Slecht</span> <br>
         <option value="Zeer slecht">Zeer slecht</option> <span> Zeer slecht</span>
         <textarea name="bericht" placeholder="Noteer hier uw toelichting" rows="6" cols="65"></textarea> <br><br>
         <input type="submit" name="sendreview" value="Verzenden">
       </form>
     </div>
    </div>

    <?php
      //  if (isset($_POST['sendreview'])) {
        //  $voornaam = $_POST['naam'];
      //    $beoordeling = $_POST['beoordeling'];
      //    $bericht = $_POST['bericht'];
      //    $arrayReview = array("voornaam" => $voornaam, "beoordeling" => $beoordeling, "bericht" => $bericht);
      //    $_SESSION['review-report'] = $arrayReview;

      //    foreach ($_SESSION['review-report'] as $index => $value) {
      //      print("Je " . $index . " is " . $value . "<br>");
    //      }
      //  }
     ?>

   <?php
      include_once 'templates/footer.php';
   ?>
   </body>
 </html>
