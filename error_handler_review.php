<?php
session_start();

  if (isset($_POST['sendreview'])) {

    $voornaam = $_POST['naam'];
    $beoordeling = $_POST['beoordeling'];
    $bericht = $_POST['bericht'];
    $arrayReview = array("voornaam" => $voornaam, "beoordeling" => $beoordeling, "bericht" => $bericht);
    $_SESSION['review-report'] = $arrayReview;

    //Kijkt of de velden leeg zijn
    if (empty($voornaam) || empty($bericht)) {
        header("Location: writereview.php?signup=empty&naam=$voornaam&bericht=$bericht");
        exit();
    }  else {
    header("Location: reviewsite.php?signup=success");
    exit();
  }
}

?>
