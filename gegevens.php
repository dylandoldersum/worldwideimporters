<?php
/**
 *
 * Created by PhpStorm.
 * User: Dylan Doldersum
 * Date: 2019-11-29
 * Time: 14:33
 */

include_once 'assets/autoloader.php';


include_once 'templates/navigation.php';
?>


<div class="container_winkelwagen">
    <form method="post">
        <input class="input-text" type="text" placeholder="Voornaam">
        <input class="input-text" type="text" placeholder="Achternaam">
        <input class="input-text" type="text" placeholder="Adres">
        <input class="input-text" type="text" placeholder="Nederland">
        <input class="input-text" type="text" placeholder="1234 AB">
        <input class="input-text" type="text" placeholder="Telefoonnummer">
        <input class="input-text" type="text" placeholder="Email@mail.com">

        <input type="submit" class="btn1" name="verzend-details">
    </form>
</div>