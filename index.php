<?php
    session_start();
    $userId = $_SESSION["userId"] ?? false;

    require "vendor/autoload.php";
    $db = new Photos\DB();
    $data = $db->getAllPhotos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>seventh lesson</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "header.php" ?>
    <h1>Галерея</h1>
    <div id="grid">
        <?php foreach ($data as $photo): ?>
            <?= (new Photos\Photo($photo["ID"], $photo["Image"], $photo["Description"]))->getHtml() ?>
        <?php endforeach; ?>
    </div>

    <?php include "addForm.php"?>

    <script src="script.js"></script>
</body>
</html>