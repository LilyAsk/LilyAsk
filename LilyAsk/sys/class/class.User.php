<?php

/**
 * Created by PhpStorm.
 * User: Hiki
 * Date: 2016/10/22
 * Time: 21:15
 */

require_once (dirname(__FILE__).'/class.Db.php');
require_once (dirname(__FILE__).'/ConstConservation.php');
//require_once (dirname(dirname(__FILE__)) . '/common.php');

class User extends Db
{
//    private $uid;
//    private $password;
//    private $nickname;
//    private $u_description;
//    private $name;
//    private $gender;
//    private $birthday;
//    private $email;
//    private $phone;
//    private $address;
//    private $introduction;
    const LOGIN_SUCCESS = 1;
    const LOGIN_FAIL = 0;


    /**
     * User constructor
     */
    public function __construct(){
        parent::__construct();
    }


    /**
     * 登录
     * @param $uid
     * @param $password
     * @return int
     */
    public function login($uid, $password)
    {

        $q = "SELECT uid FROM " . USER_INFO ." WHERE uid = $uid AND password = $password";

        $result = $this->dbc->query($q);

        if(!$result)
            return User::LOGIN_FAIL;

        // 获取一个用户
        $result = $result[0];
        echo 'The user found is '. $result;

        return User::LOGIN_SUCCESS;

    }


    /**
     * 注册，即增加用户
     * @param $uid
     * @param $password
     * @param $nickname
     * @param $name
     */
    public function add($uid, $password, $nickname, $name)
    {

        // 密码通过MD5加密
        $password = md5($password);

        if(!$this->isExist($uid)){
            $q = "INSERT INTO ". USER_INFO. " (uid, password, nickname, name) VALUES ($uid, '$password', '$nickname', '$name')";

            $result = $this->dbc->query($q);

            if ($result != 0){
                echo 'Register succeeded.<br/>';
            }else{
                echo 'Register failed<br/>';
            }
        }else{
            echo 'This id is already exist.';
        }



    }


    /**
     * 修改用户信息
     * @param $uid
     * @param $nickname
     * @param string $u_description
     * @param string $name
     * @param null $gender
     * @param string $birthday
     * @param string $email
     * @param string $phone
     * @param string $address
     * @param string $introduction
     */
    public function modify($uid, $nickname, $gender=null, $birthday="", $u_description="", $name="",
                        $email="", $phone="", $address="", $introduction="")
    {
        $q = "UPDATE " . USER_INFO . " SET nickname='$nickname', u_description='$u_description', name='$name', gender=$gender,
                                                 birthday='$birthday', email='$email', phone='$phone', address='$address', introduction='$introduction'
              WHERE uid=$uid";

        if($this->isExist($uid)){
            $result = $this->dbc->query($q);
            if ($result != 0){
                echo 'Modify user succeeded.<br/>';
            }else{
                echo 'Modify user failed.<br/>';
            }

        }else{
            echo 'No user is found.';
        }


    }


    /**
     * 通过用户ID查找用户
     * @param $uid
     * @return array|null
     */
    public function getUserById($uid)
    {
        $q = "SELECT * FROM " . USER_INFO . " WHERE uid=$uid";

        $result = $this->dbc->query($q);

        // 将获取的用户信息保存在一个一维数组内
        $row = array();
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "getUserById: 0 results";
        }

        return $row;
    }


    /**
     * 获取所有用户信息
     * @return array
     */
    public function getAllUsers()
    {
        $q = "SELECT * FROM " . USER_INFO;

        $result = $this->dbc->query($q);

        // 将获取的用户信息保存在一个二维数组
        $resultSet = array();
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
                $resultSet[] = $row;
            }
        }else {
            echo "getAllUsers: 0 results";
        }

        return $resultSet;

    }


    /**
     * 删除用户
     * @param $uid
     */
    public function delete($uid) {

        $q = "DELETE FROM " . USER_INFO . " WHERE uid=$uid";

        if($this->isExist($uid)){
            $result = $this->dbc->query($q);

            if ($result != 0){
                echo 'Delete user succeeded.<br/>';
            }else{
                echo 'Delete user failed.<br/>';
            }
        }else{
            echo 'No user is found.';
        }



    }


    /**
     * 判断用户是否存在
     * @param $uid
     * @return bool
     */
    public function isExist($uid)
    {
        $q = "SELECT * FROM " . USER_INFO . " WHERE uid=$uid";
        $result = $this->dbc->query($q);

        if(mysqli_num_rows($result) > 0){
            return true;
        }else{
            return false;
        }


    }

}



// 用于测试
$userr = new User();
$userr->add(1234, '123', 'Hiki', 'Guo');
//$userr->modify(12345, 'hiki', true, date("Y-m-d"), 'Iam hiki', 'haobin', 'guohaobin', '123', 'baita', 'Innanjing');
//$userr->modify(123, 'hiki');
//$arr =  $userr->getUserById(123);
//foreach ($arr as $item) {
//    echo $item . " ";
//}
//echo "<br/>";
$result = $userr->getAllUsers();

foreach ($result as $item){
    foreach ($item as $tem) {
        echo $tem . " ";
    }
    echo '<br/>';
}

//$exist = $userr->isExist(123);
//echo $exist;
//$userr->delete(1234);
