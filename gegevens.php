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
        <form method="post" action="betalen.php">
            <input class="input-text" name="voornaam" type="text" placeholder="Voornaam" required>
            <input class="input-text" name="achternaam" type="text" placeholder="Achternaam" required>
            <input class="input-text" name="adres" type="text" placeholder="Adres" required>
            <input class="input-text" name="huisnummer" type="text" placeholder="Huisnummer" required>
            <input class="input-text" name="land" type="text" value="Nederland" required>
            <input class="input-text" name="postcode" type="text" placeholder="1234 AB" required>
            <input class="input-text" name="telefoon" type="text" placeholder="Telefoonnummer" required>
            <input class="input-text" name="email" type="text" placeholder="Email@mail.com" required>
            <div class="betaal-btn-container">
                <input type="submit" class="betaal-btn" name="submit_info">
            </div>
        </form>
    </div>
</div>

<?php    include_once 'templates/footer.php';  ?>