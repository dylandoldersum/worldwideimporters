<?php

include_once 'assets/autoloader.php';
include_once 'templates/navigation.php';
include_once 'classes/herkansing functies.php';

If (!isset($_SESSION['loggedin'])){
    header('location: index.php');
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>KBS</title>
</head>
<body>
<span>WELKOM</span>
</body>
</html>