<?php

/**
 * Created by PhpStorm.
 * User: Hiki
 * Date: 2016/10/22
 * Time: 21:15
 */

require_once (dirname(__FILE__).'/class.Db.php');
//require_once (dirname(dirname(__FILE__)) . '/common.php');

class User extends Db
{
    private $uid;
    private $password;
    private $nickname;
    private $u_description;
    private $name;
    private $gender;
    private $birthday;
    private $email;
    private $phone;
    private $address;
    private $introduction;

    const LOGIN_SUCCESS = 1;
    const LOGIN_FAIL = 0;

    // 声明表名
    const USER_INFO = 'user_info';



    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * User constructor1.
     * @param $uid
     * @param $password
     * @param string $nickname
     * @param string $u_description
     * @param string $name
     * @param null $gender
     * @param $birthday
     * @param string $email
     * @param string $phone
     * @param string $address
     * @param string $introduction
     */
    public function __construct1($uid, $password, $nickname="", $u_description="", $name="", $gender=null, $birthday,
                         $email="", $phone="", $address="", $introduction="")
    {
        parent::__construct();
        $this->uid = $uid;
        $this->password = $password;
        $this->nickname = $nickname;
        $this->u_description = $u_description;
        $this->name = $name;
        $this->gender = $gender;
        $this->birthday = $birthday;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->introduction = $introduction;

    }

    /**
     * 登录
     * @param $uid
     * @param $password
     * @return int
     */
    public function login($uid, $password)
    {
        // 密码通过MD5加密
        $password = md5($password);

        $result = mysqli_query($this->dbc, "SELECT uid FROM " . User::USER_INFO ." WHERE uid = $uid AND password = $password");

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

        $q = "INSERT INTO ". User::USER_INFO. " (uid, password, nickname, name) VALUES ($uid, '$password', '$nickname', '$name')";
        $result = $this->dbc->query($q);

        if ($result != 0){
            echo 'Register failed.<br/>';
        }else{
            echo 'Register succeeded<br/>';
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
        $q = "UPDATE " . User::USER_INFO . " SET nickname='$nickname', u_description='$u_description', name='$name', gender=$gender,
                                                 birthday='$birthday', email='$email', phone='$phone', address='$address', introduction='$introduction'
              WHERE uid=$uid";
        $result = $this->dbc->query($q);
        if ($result != 0){
            echo 'Modify failed.<br/>';
        }else{
            echo 'Modify succeeded<br/>';
        }

    }


    /**
     * 通过学号搜索用户
     * @param $uid
     * @return bool|mysqli_result
     */
    public function getUserById($uid)
    {
        $q = "SELECT * FROM " . User::USER_INFO . " WHERE uid=$uid";
        $result = $this->dbc->query($q);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "uid: " . $row["uid"]. " - Name: " . $row["name"]. "<br>";
            }
        } else {
            echo "0 results";
        }
    }


    /**
     * 获取所有用户信息
     */
    public function getAllUsers()
    {
        return mysqli_query($this->dbc,"SELECT * FROM user_info");
    }


    /**
     * 删除用户
     * @param $id
     */
    public function delete($id) {

    }


    /**
     * 判断用户是否存在
     * @param $id
     */
    public function isExist($id)
    {

    }



}

$userr = new User();
//$userr->add(1234, '123', 'Hiki', 'Guo');
//$userr->modify(12345, 'hiki', true, date("Y-m-d"), 'Iam hiki', 'haobin', 'guohaobin', '123', 'baita', 'Innanjing');
//$userr->modify(123, 'hiki');
echo $userr->getUserById(123);