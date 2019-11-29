<?php
/**
 *
 * Created by PhpStorm.
 * User: Dylan Doldersum
 * Date: 2019-11-27
 * Time: 11:47
 */

session_start();
require_once 'assets/autoloader.php';


$json = generateMollie("Bestelling", intval(subTotaal()).".00");


Header('location:'.$json['_links']['checkout']['href']);


