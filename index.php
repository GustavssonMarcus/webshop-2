<?php
//header('Content-type: text/csv');

$ch = curl_init();

$url = "http://localhost:3000";

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
var_dump($response);

echo "Hello World Hello";