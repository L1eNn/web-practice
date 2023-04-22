<?php

    session_start();
    $userId = $_SESSION["userId"] ?? false;
    if ($userId) {
        require "vendor/autoload.php";
        $db = new Photos\DB();
        $data = $db->getUserPhotos($userId);
    }
    if (isset($_GET["error"])) {
        $error = "Неверный логин или пароль";
    }
    if (isset($_GET["signError"])) {
        $signError = "Такой логин занят";
    }
    if (isset($_GET["signSuccess"])) {
        $signSuccess = "Вы успешно зарегистрировались";
    }

?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "header.php" ?>
    <?php if ($userId): ?>
        <h1>Галерея пользователя</h1>
        <div id="grid">
            <?php foreach ($data as $photo): ?>
                <?= (new Photos\Photo($photo["ID"], $photo["Image"], $photo["Description"]))->getHtml() ?>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="form">
            <h2>Авторизация</h2>
            <form action="login.php" method="post">
                <input type="text" placeholder="Логин" name="login">
                <input type="password" placeholder="Пароль" name="password">
                <button>Вход</button>
                <?php if (isset($_GET["error"])): ?>
                    <p class="error"><?= $error ?></p>
                <?php endif ?>
            </form>
            <h2>Регистрация</h2>
            <form action="signup.php" method="post">
                <input type="text" placeholder="Логин" name="login">
                <input type="password" placeholder="Пароль" name="password">
                <button>Зарегестрироваться</button>
                <?php if (isset($_GET["signError"])): ?>
                    <p class="error"><?= $signError ?></p>
                <?php endif ?>
                <?php if (isset($_GET["signSuccess"])): ?>
                    <p class="success"><?= $signSuccess ?></p>
                <?php endif ?>
            </form>
        </div>
    <?php endif ?>

    <?php include "addForm.php"?>

    <script src="script.js"></script>
</body>
</html>
