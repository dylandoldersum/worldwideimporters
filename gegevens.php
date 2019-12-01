<?php
/**
 *
 * Created by PhpStorm.
 * User: Dylan Doldersum
 * Date: 2019-11-29
 * Time: 14:33
 */

include_once 'assets/autoloader.php';


include_once 'templates/navigation.php';
?>


<div class="steps-to-pay">
    <div class="steps">
        <li class="active"><span>1.Bestelling</span></li>
        <li><span>2.Betaling</span></li>
        <li><span>3.Bevestiging</span></li>
    </div>
</div>

<div class="container_winkelwagen">
    <div class="header_winkelwagen">
    <p>Contactgegevens</p>
    </div>
    <div class="product_winkelwagen">
    <form method="post">
        <input class="input-text" type="text" placeholder="Voornaam">
        <input class="input-text" type="text" placeholder="Achternaam">
        <input class="input-text" type="text" placeholder="Adres">
        <input class="input-text" type="text" placeholder="Huisnummer">
        <input class="input-text" type="text" value="Nederland">
        <input class="input-text" type="text" placeholder="1234 AB">
        <input class="input-text" type="text" placeholder="Telefoonnummer">
        <input class="input-text" type="text" placeholder="Email@mail.com">
        <div class="betaal-btn-container">
            <input type="submit" class="btn1" value="Verzenden" name="verzend-details">
        </div>
    </form>
    </div>
</div>