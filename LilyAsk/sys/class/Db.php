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
    private $Host;
    private $DBName;
    private $DBUser;
    private $DBPassword;
    private $pdo;
    private $connected = false;
    private $parameters;
    public $rowCount   = 0;
    public $columnCount   = 0;
    public $querycount = 0;

    public function __construct()
    {
        $this->Host = DB_HOST;
        $this->DBName = DB_NAME;
        $this->DBUser = DB_USER;
        $this->DBPassword = DB_PASS;
        $this->connect();
        $this->parameters = array();
    }

    private function connect()
    {
        try{
            // 用PDO连接数据库
            $this->pdo = new PDO('mysql:dbname=' . $this->DBName . ';host=' . $this->Host . ';charset=utf8',
                $this->DBUser,
                $this->DBPassword,
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    PDO::ATTR_EMULATE_PREPARES => false,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true
                )
            );

            // 更新连接状态
            $this->connected = true;

        }catch (mysqli_sql_exception $e){
            echo 'Mysql connection exception: ',  $e->getMessage(), "\n";
            die();
        }

    }

    private function CloseConnection()
    {
        $this->pdo = null;
    }

    private function Init($query, $parameters = ""){
        if (!$this->connected) {
            $this->connect();
        }

    }







}