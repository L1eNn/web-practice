<?php
    if (isset($_POST["image"], $_POST["text"])) {
        require "vendor/autoload.php";
        $db = new \Photos\DB();
        session_start();
        $userId = $_SESSION["userId"];
        $db->newPhoto($userId, $_POST["image"], $_POST["text"]);
        header("Location: user.php");
    }