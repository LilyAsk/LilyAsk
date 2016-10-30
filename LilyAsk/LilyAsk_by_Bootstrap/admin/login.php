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
        $uid = trim($_POST["uid"]);
//        echo $uid . " ";
    }

    if (empty($_POST["password"])) {
        $nameErr = "Password is required";
    } else {
        $password = trim($_POST["password"]);
//        echo $password;
    }

}

$_SESSION["uid"] = $uid;
$_SESSION["password"] = $password;

echo 'session uid: ' . $uid;
echo 'session password: ' . $password;

$user = new User();
$result = $user->login($_SESSION["uid"], $_SESSION["password"]);
//$result = $user->login($uid, $password);
    if($result == 0){
        header("Location: " . "../html/index.html");
        exit;
//        echo 'Login failed.';
    }
    else{
        header("Location: " . "../html/question_list.html");
        exit;
    }



















?>