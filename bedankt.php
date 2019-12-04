<?php
/**
 *
 * Created by PhpStorm.
 * User: Dylan Doldersum
 * Date: 2019-11-29
 * Time: 14:09
 */
include "assets/autoloader.php";
?>

<div class="steps-to-pay">
    <div class="steps">
        <li class="active"><span>1.Bestelling</span></li>
        <li class="active"><span>2.Betaling</span></li>
        <li class="active"><span>3.Bevestiging</span></li>
    </div>
</div>

<div class="thank-you-for-buying">
  <h1>Bedankt voor uw aankoop, <?php echo $_SESSION['contactinfo']['Voornaam']. " " . $_SESSION['contactinfo']['Achternaam']; ?>!</h1><br>
  <p>Informatie over de bestelling wordt gestuurd via de mail.</p>
  <?php

  $msg = "Bedankt voor uw bestelling van €" . subTotaal() . ".
Het pakket wordt zo snel mogelijk geleverd op het volgende adres: " . $_SESSION['contactinfo']['Adres'] . " " .
  $_SESSION['contactinfo']['Huisnummer'] . " " . $_SESSION['contactinfo']['Postcode'] . " " . $_SESSION['contactinfo']['Landnaam'] . "Bedankt namens WWI, bij vragen kunt u terecht bij wwigroep3@gmail.com"

  ;
  mail("wwigroep3@gmail.com", "UW BESTELLING", $msg);
  ?>
  <div class="contact-info-array">

  </div>
</div>
