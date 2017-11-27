<?php
//DB para
define('DB_HOST', 'localhost');
define('DB_USER','root');
define('DB_PASS', '');
define('DB_NAME', 'todo');

function __autoload($class_name){
    require_once('libraries/'.$class_name.'.php');
}
