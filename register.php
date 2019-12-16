<?php
include "assets/autoloader.php";
include "templates/navigation.php";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="registererrorhandler.php" method="POST">
      <div class=" ">
          <h1>Registreer</h1>
          <input type="text" placeholder="Voornaam" name="voornaam" required><br>
          <input type="text" placeholder="Achternaam" name="achternaam" required><br>
          <input type="password" placeholder="Wachtwoord" name="password1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"title=
          "ten minste 1 hoofdletter, 1 kleine letter 1 cijfer en moet tenminste 8 karakters lang zijn"required><br>
          <input type="password" placeholder="Herhaal Wachtwoord" name="password2"required><br>
          <input type="text" placeholder="email" name="email" required><br><br>
          <h1>Optioneel<br>Bezorggegevens</h1>
          <input type="text" placeholder="bezorgadres" name="adres"><br>
          <input type="text" placeholder="huisnummer" name="huisnummer"><br>
          <input type="text" placeholder="woonplaats" name="woonplaats"><br>
          <input type="text" placeholder="land" name="land"><br>
          <input type="text" placeholder="postcode" name="postcode"><br>
          <input type="text" placeholder="telefoon" name="telefoon"><br><br>
          <button type="submit" class="registerbutton">Registreer</button>
      </div>
</form>
</body>
</html>

