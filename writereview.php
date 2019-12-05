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
       <form class="" action="reviewsite.php" method="post">
         <span>Wat is je voornaam?</span> <br>
         <input type="text" name="naam" value=""> <br><br>
         <span>Wat geef je als beoordeling?</span> <br>
         <input type="radio" name="zeer goed" value="zg"> <span> Zeer goed</span> <br>
         <input type="radio" name="goed" value="g"> <span> Goed</span> <br>
         <input type="radio" name="matig" value="m"> <span> Matig</span> <br>
         <input type="radio" name="slecht" value="s"> <span> Slecht</span> <br>
         <input type="radio" name="zeer slecht" value="zs"> <span> Zeer slecht</span> <br><br>
         <textarea name="bericht" placeholder="Noteer hier uw toelichting" rows="6" cols="65"></textarea> <br><br>
         <input type="submit" name="sendreview" value="Verzenden">
       </form>
     </div>
    </div>

   <?php
      include_once 'templates/footer.php';
   ?>
   </body>
 </html>
