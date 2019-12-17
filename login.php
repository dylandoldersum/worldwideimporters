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
    <div class="login">
        <form action="register.php" method="post">
            <button type="submit" class="registerbutton">Registreer</button><br>
        </form>
        <form action="afterlogin.php" method="post">
            <input type="text" placeholder="email" name="email" required><br>
            <input type="password" placeholder="wachtwoord" name="wachtwoord" required><br>
            <button type="submit" class="loginbutton">Login</button>
        </form>
    </div>
</body>
</html>

<?php
    include_once 'templates/footer.php';
 ?>
