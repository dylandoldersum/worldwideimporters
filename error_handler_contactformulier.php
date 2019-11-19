<?php
  if (isset($_POST["submit"])) {

    $first = $_POST["first"];
    $last = $_POST["last"];
    $email = $_POST["email"];

    //Kijkt of de velden leeg zijn
    if (empty($first) || empty($last) || empty($email)) {
      header("Location: contact.php?signup=empty");
      exit();
    } else {
      //Kijkt of de namen wel valide karakters bevatten
      if (!preg_match("/^[a-zA-Z]*$/", $first) AND !preg_match(" ", $last)) {
        header("Location: contact.php?signup=char");
        exit();
      } else {
        //Kijkt of de invoer voor de email wel goed is
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          header("Location: contact.php?signup=email");
          exit();
        } else {
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
