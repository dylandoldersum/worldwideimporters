<?php
include_once 'classes/Products.php';
session_start();

  if (isset($_POST['sendreview'])) {

    $voornaam = $_POST['naam'];
    $beoordeling = $_POST['beoordeling'];
    $bericht = $_POST['bericht'];
    $date = date('Y-m-d H:i:s');

    if (empty($voornaam) || empty($bericht)) {
        header("Location: ../writereview.php?signup=empty&naam=$voornaam&bericht=$bericht&beoordeling=$beoordeling");
        exit();
    }  elseif (!preg_match("/^[a-zA-Z -ZÖÏÜËÄöïüëä]*$/", $voornaam)) {
        header("Location: ../writereview.php?signup=char&bericht=$bericht");
    } else {

      $host = 'localhost';
      $dbName = 'wideworldimporters';
      $user = 'root';
      $password = '';
      $connection = mysqli_connect($host, $user, $password, $dbName);

      $sql_insert = "INSERT INTO sitereviews (name, rating, message, date) VALUES ('$voornaam', '$beoordeling', '$bericht', '$date')";
      $result = mysqli_query($connection, $sql_insert);
      header("Location: ../reviewsite.php?signup=success&result=$newrecord");
  }

}

?>
