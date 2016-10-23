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
    private $host;
    private $DBName;
    private $DBUser;
    private $DBPassword;
    private $dbc;
    private $connected = false;

    public function __construct()
    {
        $this->host = DB_HOST;
        $this->DBName = DB_NAME;
        $this->DBUser = DB_USER;
        $this->DBPassword = DB_PASSWORD;
        $this->connect();
    }

    private function connect()
    {
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Could not connect to MySQL: ' . mysqli_connect_error());
        if($dbc) {
            $this->connected = true;
        }
    }














}