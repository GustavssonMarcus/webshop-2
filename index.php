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
    <h1>Matbutik</h1>
    <?php foreach ($responeObject as $products) {?>
            <h3>Namn: <?php echo $products->name ?></h3>
            <h3>Pris: <?php echo $products->price ?></h3>
       <?php } ?>
    
    
</body>
</html>

<?php
// $params = ['name' => 'Banan', 'price' => 20];


// $defaults = array(
//     CURLOPT_URL => 'http://localhost:3000/post',
//     CURLOPT_POST => true,
//     CURLOPT_POSTFIELDS => http_build_query($params),
//     CURLOPT_RETURNTRANSFER => true
// );

// $ch = curl_init();
// curl_setopt_array($ch, $defaults);

// $response = curl_exec($ch);
// //var_dump($response); 

// curl_close($ch);
