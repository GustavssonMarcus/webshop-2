<?php
$ch = curl_init();

$url = "http://localhost:3000";

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$responeObject = json_decode($response);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COOP</title>
</head>
<body>
<h1 style="text-align: center;">Matbutik</h1>
    <div class="product-container">
        <?php foreach ($responeObject as $products) { ?>
            <div class="product-card">
                <img src="<?php echo $products->img; ?>" alt="<?php echo $products->name; ?>">
                <h3><?php echo $products->name; ?></h3>
                <p>Pris: <?php echo $products->price; ?> kr/kg</p>
            </div>
        <?php } ?>
    </div>
</body>
</html>