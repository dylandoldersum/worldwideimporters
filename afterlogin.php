<?php
$email = $_POST['email'];
$password = $_POST['wachtwoord'];
$host = 'localhost';
$dbName = 'wideworldimporters';
$user = 'root';
$password = '';
$connection = mysqli_connect($host, $user, $password, $dbName);
$sqlemail = "SELECT email, password FROM accounts WHERE email = $email";
$sqlpassword = "SELECT password FROM accounts WHERE email = $email";

if ($email != $sqlemail || $password != $sqlpassword){
    header("location: login.php");
}
else
    { header("location: index.php");
}
