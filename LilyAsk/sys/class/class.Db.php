<?php

/**
 * Created by PhpStorm.
 * User: Hiki
 * Date: 2016/10/21
 * Time: 21:19
 */

define('DB_HOST', 'localhost');
define('DB_NAME', 'lilyask');
define('DB_USER', 'root');
define('DB_PASSWORD', 'guohaobin555');



class Db
{
    protected $host;
    protected $DBName;
    protected $DBUser;
    protected $DBPassword;
    protected $dbc;
    protected $connected = false;

    public function __construct()
    {
        $this->host = DB_HOST;
        $this->DBName = DB_NAME;
        $this->DBUser = DB_USER;
        $this->DBPassword = DB_PASSWORD;
        $this->dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
//        $this->connect();
    }

//    protected function connect()
//    {
//        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Could not connect to MySQL: ' . mysqli_connect_error());
//        if($dbc) {
//            $this->connected = true;
//            echo 'success<br/>';
//        }else{
//            echo 'fail<br/>';
//        }
//
//    }




}

