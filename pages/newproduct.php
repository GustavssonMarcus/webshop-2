<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = $_POST['name'] ?? '';
    $productPrice = $_POST['price'] ?? '';

    if ($productName && $productPrice) {
        $params = array(
            'name' => $productName,
            'price' => $productPrice,
        );

        $ch = curl_init();
        $defaults = array(
            CURLOPT_URL => 'http://localhost:3000/post',
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($params),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
        );

        curl_setopt_array($ch, $defaults);

        $response = curl_exec($ch);
        if ($response === false) {
            echo 'cURL Error: ' . curl_error($ch);
            $info = curl_getinfo($ch);
            echo 'cURL Info: ' . print_r($info, true);
        } else {
            header('Location: /');
            exit();
        }

        curl_close($ch);
    } else {
        echo 'Product Name and Price are required.';
    }
}
?>

<body>
    <h1>Add New Product</h1>
    <form action="" method="post">
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="price">Product Price:</label>
        <input type="number" id="price" name="price" step="1" required><br><br>

        <button type="submit">POST</button>
    </form>
</body>
</html>