<?php
include_once 'assets/autoloader.php';
include_once 'templates/navigation.php';
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

    <meta charset="utf-8">
    <title></title>
</head>
<body>

<div class="contactinfo">
    <p><span class="info">Email: </span>wwi.nederland@kbs.nl</p>
    <p><span>Telefoonnummer: </span>038-12345678</p>
    <p><span>Adres: </span>Vechtstraat 54C</p>
</div>

<div class="mapslocation">
    <p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2427.99620536824!2d6.104231615596042!3d52.51540774432237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c7df3d0fe19481%3A0x37a7f5041742a91d!2sVechtstraat%2054C%2C%208021%20AX%20Zwolle!5e0!3m2!1snl!2snl!4v1574078116779!5m2!1snl!2snl"
                width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </p>
</div>

<br>
<p class="bericht">Als u liever een bericht wilt achterlaten dan kunt u onderstaand formulier invullen</p>
<br>

<div class="contactformulier">
    <h3>Contactformulier</h3>
    <form action="handlers/error_handler_contactformulier.php" method="POST">
        <?php
        if (isset($_GET['first'])) {
            $first = $_GET['first'];
            echo '<input type="text" name="first" placeholder="Voornaam" value="' . $first . '"> <br>';
        } else {
            echo '<input type="text" name="first" placeholder="Voornaam"> <br>';
        }
        if (isset($_GET['last'])) {
            $last = $_GET['last'];
            echo '<input type="text" name="last" placeholder="Achternaam" value="' . $last . '"> <br>';
        } else {
            echo '<input type="text" name="last" placeholder="Achternaam"> <br>';
        }
        if (isset($_GET['email'])) {
            $email = $_GET['email'];
            echo '<input type="text" name="email" placeholder="Email" value="' . $email . '"> <br>';
        } else {
            echo '<input type="text" name="email" placeholder="Email"> <br>';
        }
        if (isset($_GET['bericht'])) {
            $bericht = $_GET['bericht'];
            echo '<textarea name="bericht" placeholder="Bericht"> ' . $_GET["bericht"] . ' </textarea> <br><br>';
        } else {
            echo '<textarea name="bericht" placeholder="Bericht"></textarea> <br><br>';
        }
        ?>
        <button type="submit" name="submit">Verzenden</button>
    </form>

    <br>
    <?php
    include_once 'templates/footer.php';
    ?>

    <?php
    $fullURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if (strpos($fullURL, "signup=empty") == true) {
        print('<script>
                alert("U moet wel alle velden invullen!");
            </script>');
        exit();
    } elseif (strpos($fullURL, "signup=char") == true) {
        print('<script>
                alert("U moet wel legitieme tekens voor uw naam invullen!");
            </script>');
        exit();
    } elseif (strpos($fullURL, "signup=email") == true) {
        print('<script>
                alert("U moet wel een legitieme mail invullen!");
            </script>');
        exit();
    } elseif (strpos($fullURL, "signup=success") == true) {
        print('<script>
                alert("Bedankt. We zullen spoedig contact met u opnemen");
            </script>');
        exit();
    }
    ?>
</div>
<main>

</main>
</body>
</html>
