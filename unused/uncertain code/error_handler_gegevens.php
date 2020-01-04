<?php
/*

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
        echo "1";

    } else {
        //Kijkt of de namen wel valide karakters bevatten
        if (!preg_match("/^[a-zA-ZÖÏÜËÄöïüëä ]*$/", $first) || !preg_match("/^[a-zA-Z'ÖÏÜËÄöïüëä ]*$/", $last) || !preg_match("/^[a-zA-Z' ÖÏÜËÄöïüëä]*$/", $address) || !preg_match("/^[a-zA-Z ÖÏÜËÄöïüëä]*$/", $country)){
            header("Location: gegevens.php?signup=char&first=$first&last=$last&address=$address&country=$country");
            echo "2";

        } else {
            //Kijkt of de postcode wel valide karakters bevatten
            if (!preg_match("/^[0-9A-Z]*$/", $postalcode)) {
                header("location: gegevens.php?signup=postal&postalcode=$postalcode");
                echo "3";

            } else {
                //Kijkt of het number en phone wel valide karakters bevatten
                if (preg_match("/^[0-9 +]*$/")) {
                    header("location: gegevens.php?signup=numbers&number=$number&phone=$phone");
                    echo "4";

                } else {
                    //Kijkt of de invoer voor de email wel goed is
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        header("location: gegevens.php?signup=email&email=$email");
                        echo "5";

                    } else{
                        $first = $_POST["voornaam"];
                        $last = $_POST["achternaam"];
                        $address = $_POST["adres"];
                        $number = $_POST["huisnummer"];
                        $country = $_POST["land"];
                        $postalcode = $_POST["postcode"];
                        $phone = $_POST["telefoon"];
                        $email = $_POST["email"];

                        $array_info = array("Voornaam" => $first, "Achternaam" => $last, "Adres" => $address, "Huisnummer" => $number, "Landnaam" => $country, "Postcode" => $postalcode, "Telefoonnummer" => $phone, "Emailadres" => $email);
                        $_SESSION['contactinfo'] = $array_info;
                        header("location: betalen.php");
                        echo "6";

                    }
                }
            }
        }

}
    */

?>

