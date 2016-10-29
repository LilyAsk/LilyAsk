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
// session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["userid"])) {
        $nameErr = "Name is required";
    } else {
        $userid = trim($_POST["userid"]);
    }

    if (empty($_POST["password"])) {
        $nameErr = "Password is required";
    } else {
        $password = trim($_POST["password"]);
    }

}

//$_SESSION["userid"] = $userid;
//$_SESSION["password"] = $password;

$user = new User();
$result = $user->login($userid, $password);
if(isset($result)){
    echo 'Nothing change.';
}else{
    if($result === 0){
        echo 'Login failed.';
    }
}













?>