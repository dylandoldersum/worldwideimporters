<?php
/**
 *
 * Created by PhpStorm.
 * User: Dylan Doldersum
 * Date: 2019-11-27
 * Time: 11:47
 */

$body = '{
        "amount": {"currency":"EUR", "value":"10.00"},
        "description": "Order #66",
        "redirectUrl": "https://www.example.org/payment/completed/"
}';
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
       'Authorization: Bearer test_Jjq5WrwGACystMMJ65P7t2VMdmbteW',
        'Content-Type: application/json'
    ));
    curl_setopt($ch, CURLOPT_URL, 'https://api.mollie.com/v2/payments');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,
        $body);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);

    curl_close ($ch);

    echo $server_output;
   
?>