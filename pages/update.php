<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? 0;

    $data = [
        'name' => $name,
        'price' => $price
    ];

    $url = "http://localhost:3000/put/$id";

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Content-Length: ' . strlen(json_encode($data))
    ]);


    $response = curl_exec($ch);


    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    } else {
        header('Location: /');
        exit();
    }

    curl_close($ch);

    echo $response;
}
?>

<body>
    <h1>Update Post</h1>
    <form id="updateForm" method="post">
        <br><br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br><br>
        <label for="price">Price:</label>
        <input type="number" step="0.01" id="price" name="price" required>
        <br><br>
        <button type="submit">Spara</button>
    </form>
</body>