<?php
require_once "pages/Header.php";
require_once "pages/Navbar.php";

$ch = curl_init();

//header('Content-type: text/csv');

//$url = "https://webshop-2.vercel.app/";
$url = "http://localhost:3000";

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);
$responeObject = json_decode($response);

layout_header();
?>

<?php
layout_Navbar();
?>

<body>
<h1 style="text-align: center;">Vårat sortiment</h1>
<a href="newproduct.php">
    <button type="button">Lägg till</button>
</a>
    <div class="product-container">
        <?php foreach ($responeObject as $products) { ?>
            <div class="product-card">
                <h3><?php echo $products->name; ?></h3>
                <p>Pris: <?php echo $products->price; ?> kr/kg</p>
                <div>
                    <a href="/update.php?id=<?php echo $products->id; ?>">
                        <button type="button">Uppdatera</button>
                    </a>
                    <a href="/delete.php?id=<?php echo $products->id; ?>">
                        <button type="button">Ta bort</button>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
</html>