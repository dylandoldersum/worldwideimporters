<?php
include "assets/autoloader.php";
include "templates/navigation.php";

?>
<div class="login-bg">
    <div class="login-container">
        <div class="login-box">
            <form action="handlers/registererrorhandler.php" method="POST">
                <div class="register">
                    <h3>Registreer</h3>
                    <input type="text" class="form-control-register" placeholder="Voornaam" name="voornaam" required><br>
                    <input type="text" class="form-control-register" placeholder="Achternaam" name="achternaam" required><br>
                    <input type="password" class="form-control-register" placeholder="Wachtwoord" name="password1"
                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title=
                           "ten minste 1 hoofdletter, 1 kleine letter 1 cijfer en moet tenminste 8 karakters lang zijn"
                           required><br>
                    <input type="password" class="form-control-register" placeholder="Herhaal Wachtwoord" name="password2" required><br>
                    <input type="text" class="form-control-register" placeholder="email" name="email" required><br><br>
                    <h3>Optioneel<br>Bezorggegevens</h3>
                    <input type="text" class="form-control-register" placeholder="bezorgadres" name="adres"><br>
                    <input type="text" class="form-control-register"  placeholder="huisnummer" name="huisnummer"><br>
                    <input type="text" class="form-control-register" placeholder="woonplaats" name="woonplaats"><br>
                    <input type="text" class="form-control-register" placeholder="land" name="land"><br>
                    <input type="text" class="form-control-register" placeholder="postcode" name="postcode"><br>
                    <input type="text" class="form-control-register" placeholder="telefoon" name="telefoon"><br><br>
                    <button type="submit" class="loginbutton">Registreer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once 'templates/footer.php';
?>
