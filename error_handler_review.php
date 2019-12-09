<?php
include_once 'classes/Products.php';
session_start();

  if (isset($_POST['sendreview'])) {

    $voornaam = $_POST['naam'];
    $beoordeling = $_POST['beoordeling'];
    $bericht = $_POST['bericht'];
    //$arrayReview = array("voornaam" => $voornaam, "beoordeling" => $beoordeling, "bericht" => $bericht);
    //$_SESSION['review-report'] = $arrayReview;

    //Kijkt of de velden leeg zijn
    if (empty($voornaam) || empty($bericht)) {
        header("Location: writereview.php?signup=empty&naam=$voornaam&bericht=$bericht");
        exit();
    }  else {

      $host = 'localhost';
      $dbName = 'wideworldimporters';
      $user = 'root';
      $password = '';
      $connection = mysqli_connect($host, $user, $password, $dbName);

      $sql_insert = "INSERT INTO sitereviews (name, rating, message) VALUES ('$voornaam', '$beoordeling', '$bericht')";
      $result = mysqli_query($connection, $sql_insert);
      header("Location: reviewsite.php?signup=success&result=$newrecord");
  }

}

?>
