<?php
/**
 *
 * Created by PhpStorm.
 * User: Dylan Doldersum
 * Date: 2019-11-27
 * Time: 11:47
 */

include_once 'assets/autoloader.php';

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


$json = generateMollie("Bestelling", doubleval(subTotaal()));
var_dump($json);

Header('location:' . $json['_links']['checkout']['href']);
