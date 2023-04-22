<header>
    <a href="index.php">Главная</a>
    <?php if ($userId): ?>
        <a id="showAddPhoto" href="#">Фото</a>
    <?php endif ?>
    <a href="#">Посты</a>
    <a href="user.php">Личный кабинет</a>
    <?php if ($userId): ?>
        <a href="logout.php">Выйти</a>
    <?php endif ?>
</header>