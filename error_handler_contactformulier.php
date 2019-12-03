<?php
if (isset($_POST["submit"])) {

    $first = $_POST["first"];
    $last = $_POST["last"];
    $email = $_POST["email"];
    $bericht = $_POST["bericht"];

    //Kijkt of de velden leeg zijn
    if (empty($first) || empty($last) || empty($email) || empty($bericht)) {
        header("Location: contact.php?signup=empty&first=$first&last=$last&email=$email&bericht=$bericht");
        exit();
    } else {
        //Kijkt of de namen wel valide karakters bevatten
        if (!preg_match("/^[a-zA-Z]*$/", $first) AND !preg_match(" ", $last)) {
            header("Location: contact.php?signup=char&email=$email&bericht=$bericht");
            exit();
        } else {
            //Kijkt of de invoer voor de email wel goed is
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: contact.php?signup=email&first=$first&last=$last&bericht=$bericht");
                exit();
            } else {
              mail("wwigroep3@gmail.com", $email, $bericht);
                header("Location: contact.php?signup=success");
                /*  ?>
                 <form>action="send_email.php" method="POST"</form>
                <?php */
                exit();
            }
        }
    }
} else {
    header("Location: contact.php");
    exit();
}


?>
