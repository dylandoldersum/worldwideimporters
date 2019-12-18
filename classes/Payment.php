<?php
/**
 *
 * Created by PhpStorm.
 * User: Dylan Doldersum
 * Date: 2019-11-29
 * Time: 09:58
 */

function generateMollie($desc, $price)
{
    $body = '{
        "amount": {"currency":"EUR", "value":"' . $price . '"},
        "description": "' . $desc . '",
        "redirectUrl": "http://localhost/worldwideimporters/bedankt.php"
    }';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: Bearer test_Jjq5WrwGACystMMJ65P7t2VMdmbteW',
        'Content-Type: application/json'
    ));
    curl_setopt($ch, CURLOPT_URL, 'https://api.mollie.com/v2/payments');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    curl_close($ch);
    $json = json_decode($server_output, true);

    return $json;
}

function updateStock($quantity, $id) {
    $host = 'localhost';
    $dbName = 'wideworldimporters';
    $user = 'root';
    $password = '';
    $connection = mysqli_connect($host, $user, $password, $dbName);
    $sql = "UPDATE stockitemholdings SET LastStocktakeQuantity = LastStocktakeQuantity - $quantity WHERE StockItemId=$id";
    mysqli_query($connection, $sql);
}

 function createCustomerifnoAccount() {
   $host = 'localhost';
   $dbName = 'wideworldimporters';
   $user = 'root';
   $password = '';
   $connection = mysqli_connect($host, $user, $password, $dbName);
   // var_dump($_SESSION['contactinfo']);
   // echo $_SESSION['contactinfo']['Voornaam'];
   // exit;
   $sql = "INSERT INTO accounts (first_name , last_name, email, street, streetnumber, country, postalcode, phone)
   VALUES ($_SESSION['contactinfo']['Voornaam'], $_SESSION['contactinfo']['Achternaam'], $_SESSION['contactinfo']['Emailadres'], $_SESSION['contactinfo']['Adres'], $_SESSION['contactinfo']['Huisnummer'], $_SESSION['contactinfo']['Landnaam'], $_SESSION['contactinfo']['Postcode'])";
   echo $sql;
   //mysqli_query($connection, $sql);
 }
