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

    <div class="contactinfo">
      <p> <span class="info">Email: </span>wwi.nederland@kbs.nl</p>
      <p><span>Telefoonnummer: </span>038-12345678</p>
      <p><span>Adres: </span>Vechtstraat 54C</p>
    </div>

    <div class="mapslocation">
      <p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2427.99620536824!2d6.104231615596042!3d52.51540774432237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c7df3d0fe19481%3A0x37a7f5041742a91d!2sVechtstraat%2054C%2C%208021%20AX%20Zwolle!5e0!3m2!1snl!2snl!4v1574078116779!5m2!1snl!2snl" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
      </p>
    </div>


  </body>
</html>

<?php
  include_once 'templates/footer.php';
 ?>
