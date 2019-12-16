<?php
$email = $_POST['email'];
$userpassword = $_POST['wachtwoord'];
$host = 'localhost';
$dbName = 'wideworldimporters';
$user = 'root';
$password = '';
$connection = mysqli_connect($host, $user, $password, $dbName);

$sql = "SELECT * FROM accounts WHERE email ='$email' AND password = '$userpassword'";
try {
    $result = mysqli_query($connection, $sql);
    if(mysqli_num_rows($result)==1){
        header("location: index.php");
    }
    else {
        echo "Ongeldige login!";
    }
}
catch (mysqli_sql_exception $e){
    return($e);
}