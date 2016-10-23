<?php
/**
 * Created by PhpStorm.
 * User: Hiki
 * Date: 2016/10/23
 * Time: 11:08
 */


function autoloader($class) {
    include 'class/class' . $class .'.php';
}

spl_autoload_register('autoloader');

?>