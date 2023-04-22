<?php
    if (isset($_POST["login"], $_POST["password"])) {
        require "vendor/autoload.php";
        $db = new \Photos\DB();
        $userId = $db->checkUser($_POST["login"], $_POST["password"]);
        if ($userId) {
            session_start();
            $_SESSION["userId"] = $userId;
            header("Location: user.php");
        }
        else {
            header("Location: user.php?error=login");
        }
    }