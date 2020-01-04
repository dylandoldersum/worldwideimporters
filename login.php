<?php
include "assets/autoloader.php";
include "templates/navigation.php";
?>

<div class="login-bg">
    <div class="login-container">
        <div class="login-box">
            <form action="handlers/afterloginHandler.php" method="post">
                <h3>Login met uw account</h3>
                <input type="text" placeholder="Login@voorbeeld.nl" name="email" class="email-login" required>
                <input type="password" placeholder="Wachtwoord" name="wachtwoord" class="password-login" required>
                <button type="submit" class="loginbutton">Login</button>
                <a class="registerbutton" href="register.php">Geen account? Registreer nu gratis!
                </a>
            </form>
        </div>
    </div>
</div>

<?php
include_once 'templates/footer.php';
?>
