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
  <h1>Bedankt voor uw aankoop!</h1><br>
  <p>Hieronder vindt u informatie over uw bestelling</p>
  <div class="contact-info-array">
    <?php
      foreach ($_SESSION['contactinfo'] as $index => $value) {
        print($index . ": " . $value . "<br>");
      }
     ?>
  </div>
  <br><br>
  <p>Uw bestelling wordt geleverd op: </p>
</div>
