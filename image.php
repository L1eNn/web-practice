<?php
    session_start();
    $userId = $_SESSION["userId"] ?? false;
    $photoId = intval($_GET["id"]);
    require  "vendor/autoload.php";
    $db = new \Photos\DB();
    $photo = $db->getPhotoById($photoId);
    $comments = $db->getPhotoComments($photoId);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Фото</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "header.php" ?>

    <img src="<?= $photo["Image"] ?>" alt="">
    <h1><?= $photo["Description"] ?></h1>
    <p><?= $photo["Name"] ?></p>
    <div class="comments">
        <div class="form">
            <textarea id="text" rows="5"></textarea>
            <button id="addComment">Добавить</button>
        </div>
        <h2>Комментарии:</h2>
        <?php foreach($comments as $comment): ?>
            <div class="comment">
                <p class="author"><?= $comment["Name"] ?></p>
                <p class="text"><?= $comment["Text"] ?></p>
                <p class="date"><?= $comment["Post_date"] ?></p>
            </div>
        <?php endforeach ?>
    </div>
    <script src="image.js"></script>
</body>
</html>