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
        header("Location: writereview.php?signup=empty&first=$first&last=$last&email=$email&bericht=$bericht");
        exit();
    } else {
        //Kijkt of de namen wel valide karakters bevatten
        if (!preg_match("/^[a-zA-Z]*$/", $first) AND !preg_match(" ", $last)) {
            header("Location: writereview.php?signup=char&email=$email&bericht=$bericht");
            exit();
        } else {
            //Kijkt of de invoer voor de email wel goed is
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: writereview.php?signup=email&first=$first&last=$last&bericht=$bericht");
                exit();
            } else {
              mail("wwigroep3@gmail.com", $email, $bericht);
                header("Location: reviewsite.php?signup=success");
                exit();
            }
        }
    }
} else {
    header("Location: contact.php");
    exit();
}

?>
