<?php
/**
 *
 * Created by PhpStorm.
 * User: Dylan Doldersum
 * Date: 2019-11-27
 * Time: 11:47
 */

include_once 'assets/autoloader.php';
$first = $_POST["voornaam"];
$last = $_POST["achternaam"];
$address = $_POST["adres"];
$number = $_POST["huisnummer"];
$country = $_POST["land"];
$postalcode = $_POST["postcode"];
$phone = $_POST["telefoon"];
$email = $_POST["email"];

$array_info = array("Voornaam" => $first, "Achternaam" => $last, "Adres" => $address, "Huisnummer" => $number, "Landnaam" => $country, "Postcode" => $postalcode, "Telefoonnummer" => $phone, "Emailadres" => $email);
$_SESSION['contactinfo'] = $array_info;

$bestelline = "";

foreach ($_SESSION['itemID'] as $arrayitem) {
    $bestelline .= $arrayitem['quantity'] . " X " . $arrayitem['pname'] . " = " . $arrayitem['quantity'] * $arrayitem['price'] . "  ";
}

$desc = $_SESSION['contactinfo']['Voornaam'];
$desc .= " ".$_SESSION['contactinfo']['Achternaam']." - ".rand(10000, 20000);
$desc .= " - ";
$desc .= "$bestelline";

$json = generateMollie($desc, doubleval($_SESSION['TOT']));

Header('location:' . $json['_links']['checkout']['href']);
