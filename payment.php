<?php

session_start();

$postData = $_POST['param'];

$username = "PK19329_f0d9f885feff";  
$password = "wWGkKjIqKhllFEVF";  

$header = array(
'Content-Type:application/json',
'Authorization:Basic '.base64_encode($username . ":" . $password)
);

		$ch = curl_init('https://api.playground.klarna.com/checkout/v3/orders');
        curl_setopt ($ch, CURLOPT_POST, 1); 
        
        curl_setopt ($ch, CURLOPT_POSTFIELDS,  $postData); 
        curl_setopt($ch, CURLOPT_HTTPHEADER,$header);

    $content  = curl_exec($ch);

?>