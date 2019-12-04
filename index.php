<?php
/**
 *
 * Created by PhpStorm.
 * User: Dylan Doldersum
 * Date: 2019-11-07
 * Time: 19:29
 */

/** Automatisch laden van header */
include_once 'assets/autoloader.php';

if(isset($_GET['betaald'])) {
    unset($_SESSION['itemID']);
    header('location: index.php');
}

/** Templates met gebruik van includes **/
include_once 'templates/navigation.php';
include_once 'templates/indexbody.php';


include_once 'templates/footer.php';

?>
