<?php
$poruka = "";
// logovanje
$post = [
    'username' => 'q1234',
    'password' => 'q1234'
];

$ch = curl_init('http://localhost/php/loginservice.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

// execute!
$response = curl_exec($ch);

// close the connection, release resources used
curl_close($ch);

// do anything you want with your response
$obj = json_decode($response);
$token = $obj->{'token'};

$headers = array();
$headers[] = 'token: '.$token;

// get zahtev sa jednim custom HTTP headerom
$ch = curl_init('http://localhost/php/deleteroom.php?id=3');
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// execute!
$response = curl_exec($ch);

// close the connection, release resources used
curl_close($ch);

// do anything you want with your response
error_log($response);
$poruka .= "obrisana soba sa id=3 ";

/////////////
$headers = array();
$headers[] = 'token: '.$token;

$post = [
    'id' => '6',
    'hasTV' => '1',
    'beds' => '4'
];

$ch = curl_init('http://localhost/php/updateroom.php');
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// execute!
$response = curl_exec($ch);

// close the connection, release resources used
curl_close($ch);

// do anything you want with your response
error_log($response);
$poruka .= "azurirana soba sa id=6 ";

echo $poruka;
?>