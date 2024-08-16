<?php
$ch = curl_init();
$url = "http://localhost:3000";

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);
$products = json_decode($response);

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=produkter.csv');

$output = fopen('php://output', 'w');

fputcsv($output, array('ID', 'Namn', 'Pris (kr/kg)'));

foreach ($products as $product) {
    fputcsv($output, array($product->id, $product->name, $product->price));
}

fclose($output);
?>
