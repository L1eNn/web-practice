<?php
    session_start();
    if (isset($_POST["photoId"], $_POST["text"], $_SESSION["userId"])) {
        require "vendor/autoload.php";
        $db = new \Photos\DB();
        $insertedComment = $db->addComment($_POST["photoId"], $_SESSION["userId"], $_POST["text"]);
        echo json_encode($insertedComment);
    }