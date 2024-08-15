<?php
require_once ("pages/Header.php");
require_once ("pages/Navbar.php");

$ch = curl_init();

//header('Content-type: text/csv');

$url = "http://localhost:3000";

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$responeObject = json_decode($response);

layout_header();
?>

<?php
layout_Navbar();
?>

<body>
<h1 style="text-align: center;">Vårat sortiment</h1>
    <div class="product-container">
        <?php foreach ($responeObject as $products) { ?>
            <div class="product-card">
                <img src="<?php echo $products->img; ?>" alt="<?php echo $products->name; ?>">
                <h3><?php echo $products->name; ?></h3>
                <p>Pris: <?php echo $products->price; ?> kr/kg</p>
                <button>Köp</button>
            </div>
        <?php } ?>
    </div>
</body>
</html>