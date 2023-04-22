<?php
    if (isset($_POST["login"], $_POST["password"])) {
        require "vendor/autoload.php";
        $db = new \Photos\DB();
        $loginExist = $db->checkLogin($_POST["login"]);
        if ($loginExist) {
            header("Location: user.php?signError=login");
        }
        else {
            $db->newUser($_POST["login"], $_POST["password"]);
            header("Location: user.php?signSuccess=ok");
        }
    }