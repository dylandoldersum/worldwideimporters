<?php
$email = $_POST['email'];
$userpassword = $_POST['wachtwoord'];
$host = 'localhost';
$dbName = 'wideworldimporters';
$user = 'root';
$password = '';
$connection = mysqli_connect($host, $user, $password, $dbName);

session_start();

$sql = "SELECT * FROM accounts WHERE email ='$email' AND password = '$userpassword'";
try {
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['loggedin'] = true;
        $_SESSION['logindata'] = mysqli_fetch_assoc($result);
        header('location: index.php');
    } else {
        echo "Ongeldige login!";
    }
} catch (mysqli_sql_exception $e) {
    return ($e);
}

