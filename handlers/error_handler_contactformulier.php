<?php
if (isset($_POST["submit"])) {

    $first = $_POST["first"];
    $last = $_POST["last"];
    $email = $_POST["email"];
    $bericht = $_POST["bericht"];

    if (empty($first) || empty($last) || empty($email) || empty($bericht)) {
        header("Location: contact.php?signup=empty&first=$first&last=$last&email=$email&bericht=$bericht");
        exit();
    } else {
        if (!preg_match("/^[a-zA-Z]*$/", $first) AND !preg_match(" ", $last)) {
            header("Location: contact.php?signup=char&email=$email&bericht=$bericht");
            exit();
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: contact.php?signup=email&first=$first&last=$last&bericht=$bericht");
                exit();
            } else {
              mail("wwigroep3@gmail.com", $email, $bericht);
                header("Location: contact.php?signup=success");
                exit();
            }
        }
    }
} else {
    header("Location: contact.php");
    exit();
}


?>
