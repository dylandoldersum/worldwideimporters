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
       <form class="" action="error_handler_productreview.php?itemID=<?php echo $_GET['itemID'] ?>&CatID=<?php echo $_GET['CatID'] ?>" method="post">
         <span>Wat is je voornaam?</span> <br>
         <input type="text" name="naam" value="" required><br>

         <span>Wat geef je als beoordeling?</span> <br>
         <select name="beoordeling" required>
         <option value="Zeer goed">Zeer goed</option> <span> Zeer goed</span> <br>
         <option value="Goed">Goed</option> <span> Goed</span> <br>
         <option value="Matig">Matig</option> <span> Matig</span> <br>
         <option value="Slecht">Slecht</option> <span> Slecht</span> <br>
         <option value="Zeer slecht">Zeer slecht</option> <span> Zeer slecht</span>

         <textarea name="bericht" placeholder="Noteer hier uw toelichting" rows="6" cols="65" required></textarea> <br><br>
         <input type="submit" name="sendreview" value="Verzenden">
       </form>
     </div>
    </div>

   </body>
 </html>

 <?php
      include_once 'templates/footer.php';
  ?>
