<?php
/**
 *
 * Created by PhpStorm.
 * User: Dylan Doldersum
 * Date: 2019-11-29
 * Time: 09:58
 */

function generateMollie($name) {
    $body = '{
        "amount": {"currency":"EUR", "value":"10.00"},
        "description": "'.$name.'",
        "redirectUrl": "https://www.example.org/payment/completed/"
    }';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: Bearer test_Jjq5WrwGACystMMJ65P7t2VMdmbteW',
        'Content-Type: application/json'
    ));
    curl_setopt($ch, CURLOPT_URL, 'https://api.mollie.com/v2/payments');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    curl_close ($ch);
    $json = json_decode($server_output, true);
    return $json;
}