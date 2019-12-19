<?php
/**
 *
 * Created by PhpStorm.
 * User: Dylan Doldersum
 * Date: 2019-11-29
 * Time: 14:09
 */
include "assets/autoloader.php";
include "templates/navigation.php";

if(empty($_SESSION['itemID']) || empty($_SESSION['contactinfo'])) {
    header('location: index.php');
} else {

    ?>
    <div class="steps-to-pay">
        <div class="steps">
            <li class="active"><span>1.Bestelling</span></li>
            <li class="active"><span>2.Betaling</span></li>
            <li class="active"><span>3.Bevestiging</span></li>
        </div>
    </div>

    <div class="thank-you-for-buying">
        <h1>Bedankt voor uw
            aankoop, <?php echo $_SESSION['contactinfo']['Voornaam'] . " " . $_SESSION['contactinfo']['Achternaam']; ?>
            !</h1><br>
        <p>Informatie over de bestelling wordt gestuurd via de mail.</p><br>
        <p>Bestelling wordt geleverd
            op: <?php echo $_SESSION['contactinfo']['Adres'] . " " . $_SESSION['contactinfo']['Huisnummer'] . " " . $_SESSION['contactinfo']['Postcode'] . " " . $_SESSION['contactinfo']['Landnaam'] ?></p>
        <?php
        $bestelline = "";
        foreach ($_SESSION['itemID'] as $arrayitem) {
            $quantity = $arrayitem['quantity'];
            $itemId = $arrayitem['code'];
            $bestelline .= $arrayitem['quantity'] . " X " . $arrayitem['pname'] . " = " . $arrayitem['quantity'] * $arrayitem['price'] . "\n";
        }
        updateStock($quantity, $itemId);


        $msg = "Bedankt voor uw bestelling van €" . $_SESSION['TOT'] . ".
Het pakket wordt zo snel mogelijk geleverd op het volgende adres: " . $_SESSION['contactinfo']['Adres'] . " " .
            $_SESSION['contactinfo']['Huisnummer'] . " " . $_SESSION['contactinfo']['Postcode'] . " " . $_SESSION['contactinfo']['Landnaam'] . "\n\nBedankt namens WWI, bij vragen kunt u terecht bij wwigroep3@gmail.com \n\n"
            . "De bestelling: \n\n" . $bestelline . "Totaal: " . $_SESSION['TOT'];;
        mail("wwigroep3@gmail.com", "UW BESTELLING", $msg);
        ?>
        <div class="contact-info-array">
        </div>

        <a class="back-to-home" href="index.php?betaald=success">Terug naar de homepagina</a>
    </div>

    <?php
    
    include_once 'templates/footer.php';
}
?>
