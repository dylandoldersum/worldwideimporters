<?php
/**
 *
 * Created by PhpStorm.
 * User: Dylan Doldersum
 * Date: 2019-11-27
 * Time: 11:47
 */

include_once 'assets/autoloader.php';


$json = generateMollie("Bestelling", doubleval(subTotaal()));
var_dump($json);

Header('location:' . $json['_links']['checkout']['href']);


