<?php
if (isset($_POST['submit'])) {
    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $textarea = $_POST['textarea'];

    $MailTo = "WWIgroep3@yahoo.com ";
    $headers = "From:" . $email;
    $txt = "You have received an e-mail from " . $first . $last . "." . "\n \n" . $textarea;


    mail($MailTo, $first, $txt, $headers);
    header("Location: index.php?emailsend");

}