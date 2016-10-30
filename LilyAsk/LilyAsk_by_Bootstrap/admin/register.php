<?php
/**
 * Created by PhpStorm.
 * User: Hiki
 * Date: 2016/10/21
 * Time: 21:07
 */

define('LILY_ROOT', dirname(dirname(dirname(__FILE__))) . '/');
require(LILY_ROOT . "sys/class/class.User.php");


// Start the session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["uid"])) {
        $nameErr = "Name is required";
    } else {
        $userid = trim($_POST["uid"]);
        echo $uid . " ";
    }

    if (empty($_POST["password"])) {
        $nameErr = "Password is required";
    } else {
        $password = trim($_POST["password"]);
        echo $password;
    }

    if (empty($_POST["name"])) {
        $nameErr = "Password is required";
    } else {
        $name = trim($_POST["password"]);
        echo $name;
    }

    if (empty($_POST["nickname"])) {
        $nameErr = "Password is required";
    } else {
        $nickname = trim($_POST["password"]);
        echo $nickname;
    }

}


$user = new User();
$result = $user->add($uid, $password, $nickname, $name);
if(isset($result)){
    echo 'Nothing change.';
}else{
    if($result === 0){
        echo 'Login failed.';
    }
    else{
        echo 'register success.';
        header("Location: " . "../html/index.html");
    }
}