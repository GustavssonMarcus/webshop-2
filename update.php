<?php

?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Post</title>
</head>
<body>
    <h1>Update Post</h1>
    <form id="updateForm">
        <br><br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br><br>
        <label for="price">Price:</label>
        <input type="number" step="0.01" id="price" name="price" required>
        <br><br>
        <a href="/">
            <button type="button">Update Post</button>
        </a>
    </form>
    </body>
</html>