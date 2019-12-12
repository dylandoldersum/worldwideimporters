<?php
    /** Automatisch laden van header */
    include_once 'assets/autoloader.php';
    /** Templates met gebruik van includes **/
    include_once 'templates/navigation.php';

    $fullURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
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
         <?php
            if (isset($_GET['naam'])) {
              $voornaam = $_GET['naam'];
              echo '<input type="text" name="naam" value="' . $voornaam . '"> <br><br>';
            } else {
              echo '<input type="text" name="naam" value=""> <br><br>';
            }
          ?>
         <span>Wat geef je als beoordeling?</span> <br>
         <select name="beoordeling">
         <option value="Zeer goed">Zeer goed</option> <span> Zeer goed</span> <br>
         <option value="Goed">Goed</option> <span> Goed</span> <br>
         <option value="Matig">Matig</option> <span> Matig</span> <br>
         <option value="Slecht">Slecht</option> <span> Slecht</span> <br>
         <option value="Zeer slecht">Zeer slecht</option> <span> Zeer slecht</span>
         <?php
           if (isset($_GET['bericht'])) {
             $bericht = $_GET['bericht'];
              echo '<textarea name="bericht" rows="6" cols="65">' . $bericht . '</textarea> <br><br>';
            } else {
              echo '<textarea name="bericht" placeholder="Noteer hier uw toelichting" rows="6" cols="65"></textarea> <br><br>';
            }
         ?>
         <input type="submit" name="sendreview" value="Verzenden">
       </form>
     </div>
    </div>

    <?php
    if (strpos($fullURL, "signup=empty") == true) {
        print('<script>
                alert("U moet wel alle velden invullen!");
              </script>');
        exit();
    } elseif (strpos($fullURL, "signup=char") == true) {
        print('<script>
                alert("U moet wel valide tekens voor uw naam gebruiken");
              </script>');
        exit();
    }
    ?>


   <?php
      include_once 'templates/footer.php';
   ?>
   </body>
 </html>
