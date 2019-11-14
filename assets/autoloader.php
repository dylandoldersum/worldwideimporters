<?php
/**
 *
 * Created by PhpStorm.
 * User: Dylan Doldersum
 * Date: 2019-11-07
 * Time: 19:38
 */


 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "wideworldimporters";

 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }



?>
<head>
    <title>KBS</title>
    <link rel="stylesheet" type="text/css" href="assets/css/stylesheet.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/product-detail.css"/>

</head>
