<?php
namespace photos;
use mysqli;
class DB {
    static $host = "localhost";
    static $user = "root";
    static $password = "";
    static $database = "photos";
    public $link;

    public function __construct() {
        $this->link = new mysqli(DB::$host, DB::$user, DB::$password, DB::$database);
        $this->link->set_charset("utf8");
    }

    public function getAllPhotos() {
        $sqlResult =  $this->link->query("SELECT * FROM `photos` ORDER BY `ID` desc");
        if ($sqlResult->num_rows) {
            return $sqlResult->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    }

    public function getUserPhotos($uid) {
        $sqlResult =  $this->link->query("SELECT * FROM `photos` WHERE `UID` = $uid ORDER BY `ID` desc");
        if ($sqlResult->num_rows) {
            return $sqlResult->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    }

    public function checkUser($login, $password) {
        $sqlResult =  $this->link->query("SELECT * FROM `users` WHERE `Email` = '$login' AND `Password` = '$password'");
        if ($sqlResult->num_rows) {
            $user = $sqlResult->fetch_assoc();
            return $user["ID"];
        }
        return false;
    }

    public function checkLogin($login) {
        $sqlResult =  $this->link->query("SELECT * FROM `users` WHERE `Email` = '$login'");
        if ($sqlResult->num_rows) {
            return true;
        }
        return false;
    }

    public function newUser($login, $password) {
        $this->link->query("INSERT INTO `users` (Name, Password, Email) VALUES ('', '$password', '$login')");
    }


    public function newPhoto($uid, $image, $text) {
        $this->link->query("INSERT INTO `photos` (UID, Image, Description, Tags) VALUES ($uid, '$image', '$text', '')");
    }

    public function getPhotoById($photoId) {
        $sqlResult = $this->link->query(
            "SELECT `p`.*, `u`.`Name` FROM `photos` `p` LEFT JOIN `users` `u` on `u`.`ID` = `p`.`UID` WHERE `p`.`ID`='$photoId'");
        if ($sqlResult->num_rows) {
            return $sqlResult->fetch_assoc();
        }
        return false;
    }

    public function getPhotoComments($photoId) {
        $sqlResult = $this->link->query(
            "SELECT `c`.*, `u`.`Name` FROM `comments` `c` LEFT JOIN `users` `u` on `u`.`ID` = `c`.`UID` WHERE `c`.`PID`='$photoId' ORDER BY `ID` DESC");
        if ($sqlResult->num_rows) {
            return $sqlResult->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    }

    public function addComment($pid, $uid, $text) {
        $date = date("Y-m-d");
        $this->link->query("INSERT INTO `comments` (PID, UID, Text, Post_date) VALUES ($pid, $uid, '$text', '$date')");
        $lastId = $this->link->insert_id;
        $insertedComment = $this->link->query(
            "SELECT `c`.*, `u`.`Name` FROM `comments` `c` LEFT JOIN `users` `u` on `u`.`ID` = `c`.`UID` WHERE `c`.`ID`='$lastId'");
        return $insertedComment->fetch_assoc();
    }
}