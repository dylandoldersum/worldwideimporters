<?php
if (isset($_POST["submit"])) {

    $first = $_POST["voornaam"];
    $last = $_POST["achternaam"];
    $address = $_POST["adres"];
    $number = $_POST["huisnummer"];
    $country = $_POST["land"];
    $postalcode = $_POST["postcode"];
    $phone = $_POST["telefoon"];
    $email = $_POST["email"];

    //Kijkt of de velden leeg zijn
    if (empty($first) || empty($last) || empty($address) || empty($number) || empty($country) || empty($postalcode) || empty($phone) || empty($email)) {
        header("Location: gegevens.php?signup=empty&first=$first&last=$last&address=$address&number=$number&country=$country&postalcode=$postalcode&phone=$phone&email=$email");
        exit();
    } else {
        //Kijkt of de namen wel valide karakters bevatten
        if (!preg_match("/^[a-zA-ZÖÏÜËÄöïüëä ]*$/", $first) || !preg_match("/^[a-zA-Z'ÖÏÜËÄöïüëä ]*$/", $last) || !preg_match("/^[a-zA-Z' ÖÏÜËÄöïüëä]*$/", $address) || !preg_match("/^[a-zA-Z ÖÏÜËÄöïüëä]*$/", $country)){
            header("Location: gegevens.php?signup=char&first=$first&last=$last&address=$address&country=$country");
            exit();
        } else {
            //Kijkt of de postcode wel valide karakters bevatten
            if (!preg_match("/^[a-zA-Z{4}0-9{2}]$/", $postalcode)) {
                header("location: gegevens.php?signup=postal&postalcode=$postalcode");
                exit();
            } else {
                //Kijkt of het number en phone wel valide karakters bevatten
                if (preg_match("/^[1-9+]*$/")) {
                    header("location: gegevens.php?signup=numbers&number=$number&phone=$phone");
                    exit();
                } else {
                    //Kijkt of de invoer voor de email wel goed is
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        header("ocation: gegevens.php?signup=email&email=$email");
                        exit();
                    } else{
                        header("location: betalen.php");
                        exit();
                    }
                }
            }
        }
    }
} else {
    header("Location: contact.php");
    exit();
}

?>

