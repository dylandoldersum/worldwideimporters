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
        "redirectUrl": "http://localhost/worldwideimporters/addcustomer.php"
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

function addOrder(){
  $host = 'localhost';
  $dbName = 'wideworldimporters';
  $user = 'root';
  $password = '';
  $connection = mysqli_connect($host, $user, $password, $dbName);
  $sql = "SELECT CustomerID FROM accounts WHERE first_name = '".$_SESSION['contactinfo']['Voornaam']."' AND email = '".$_SESSION['contactinfo']['Emailadres']."' AND street = '".$_SESSION['contactinfo']['Adres']."' AND postalcode = '".$_SESSION['contactinfo']['Postcode']."'";
  $result = mysqli_query($connection, $sql);
  foreach ($result as $value) {
    $id = $value['CustomerID'];
    $sql1 = "INSERT INTO order1(CustomerID) VALUES ($id)";
    mysqli_query($connection, $sql1);
 }

}

function addOrderLine(){
  $host = 'localhost';
  $dbName = 'wideworldimporters';
  $user = 'root';
  $password = '';
  $connection = mysqli_connect($host, $user, $password, $dbName);

  $sql = "SELECT orderID FROM order1 WHERE CustomerID IN (SELECT CustomerID FROM accounts WHERE first_name = '".$_SESSION['contactinfo']['Voornaam']."' AND email = '".$_SESSION['contactinfo']['Emailadres']."' AND street = '".$_SESSION['contactinfo']['Adres']."' AND postalcode = '".$_SESSION['contactinfo']['Postcode']."')";
  $result = mysqli_query($connection, $sql);
  foreach ($result as $value) {
    $id = $value['orderID'];

    foreach ($_SESSION['itemID'] as $arrayitem) {
      $quantity = $arrayitem['quantity'];
      $itemId = $arrayitem['code'];
      $price = $arrayitem['price'];
      $sql1 = "INSERT INTO orderline1(orderID, StockItemID, quantity, UnitPrice) VALUES ($id, $itemId, $quantity, $price)";
      mysqli_query($connection, $sql1);
    }
 }
}

function createCustomerifnoAccount() {
   $host = 'localhost';
   $dbName = 'wideworldimporters';
   $user = 'root';
   $password = '';
   $connection = mysqli_connect($host, $user, $password, $dbName);
   $sql = "INSERT INTO accounts (first_name , last_name, email, street, streetnumber, country, postalcode)
   VALUES ('".$_SESSION['contactinfo']['Voornaam']."', '".$_SESSION['contactinfo']['Achternaam']."', '".$_SESSION['contactinfo']['Emailadres']."', '".$_SESSION['contactinfo']['Adres']."', '".$_SESSION['contactinfo']['Huisnummer']."', '".$_SESSION['contactinfo']['Landnaam']."', '".$_SESSION['contactinfo']['Postcode']."')";
   mysqli_query($connection, $sql);
 }
