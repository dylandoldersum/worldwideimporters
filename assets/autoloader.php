<?php
/**
 *
 * Created by PhpStorm.
 * User: Dylan Doldersum
 * Date: 2019-11-07
 * Time: 19:38
 */

require_once 'classes/Database.php';
require_once 'classes/Products.php';

$db = new Database();
$products = new Products();

if(!$db->connect())
    exit;

?>
<head>
    <title>KBS</title>
    <link rel="stylesheet" type="text/css" href="assets/css/stylesheet.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/product-detail.css"/>

</head>
