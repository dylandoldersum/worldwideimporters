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
            <input class="input-text" name="voornaam" type="text" placeholder="Voornaam">
            <input class="input-text" name="achternaam" type="text" placeholder="Achternaam">
            <input class="input-text" name="adres" type="text" placeholder="Adres">
            <input class="input-text" name="huisnummer" type="text" placeholder="Huisnummer">
            <input class="input-text" name="land" type="text" value="Nederland">
            <input class="input-text" name="postcode" type="text" placeholder="1234 AB">
            <input class="input-text" name="telefoon" type="text" placeholder="Telefoonnummer">
            <input class="input-text" name="email" type="text" placeholder="Email@mail.com">
            <div class="betaal-btn-container">
                <input type="submit" name="submit_info">
            </div>
        </form>
    </div>
</div>

<?php
    if (isset($_POST['submit_info'])) {
      $voornaam = $_POST['voornaam'];
      $achternaam = $_POST['achternaam'];
      $adres = $_POST['adres'];
      $huis = $_POST['huisnummer'];
      $land = $_POST['land'];
      $postcode = $_POST['postcode'];
      $telefoon = $_POST['telefoon'];
      $email = $_POST['email'];

      $array_info = array("Voornaam" => $voornaam, "Achternaam" => $achternaam, "Adres" => $adres, "Huisnummer" => $huis, "Landnaam" => $land, "Postcode" => $postcode, "Telefoonnummer" => $telefoon, "Emailadres" => $email);
      $_SESSION['contactinfo'] = $array_info;
      echo $_SESSION['contactinfo']['Achternaam']; //voorbeeld
    }
 ?>
