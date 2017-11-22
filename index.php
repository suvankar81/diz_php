<?php
define("APP_NAME", "BARTA");
define("APP_PATH", getcwd());
define("APP_DIR", __DIR__);
define("HTTP_HOST", "");//$_SERVER['HTTP_HOST'] == 'localhost:8080';$_SERVER['SERVER_NAME'] == 'localhost';
define("SERVER_NAME","");
define("DOMAIN_NAME","NA");
$url = explode('/', $_SERVER['REQUEST_URI']);define("F_D",0);
include('DIZ/engine.php');


 ?>
