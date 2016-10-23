<?php

/**
 * Created by PhpStorm.
 * User: Hiki
 * Date: 2016/10/22
 * Time: 21:15
 */
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

    /**
     * User constructor.
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
    public function __construct($uid, $password, $nickname="", $u_description="", $name="", $gender=null, $birthday,
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

        $result = mysqli_query($this->dbc, "SELECT uid FROM user_info WHERE uid = $uid AND password = $password");

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
    public function modify($uid, $nickname, $u_description="", $name="", $gender=null, $birthday="",
                        $email="", $phone="", $address="", $introduction="")
    {

    }


    /**
     * 通过学号搜索用户
     * @param $uid
     */
    public function getUserById($uid)
    {

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