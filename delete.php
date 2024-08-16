<?php
$id = "";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
 
    $ch = curl_init();
    $url = "https://webshop-2.vercel.app/delete/$id";
 
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
    $response = curl_exec($ch);
 
 
    curl_close($ch);
    header('Location: /');
    exit();
}
 
ob_start();
?>
 
 
<?php
ob_end_flush();
?>