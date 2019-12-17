<?php
/**
 *
 * Created by PhpStorm.
 * User: Dylan Doldersum
 * Date: 2019-12-17
 * Time: 13:26
 */

session_start();

unset($_SESSION['loggedin']);
unset($_SESSION['logindata']);

header('location: index.php');