<?php
session_start();
define('SITEURL','http://localhost/hairoil/');
define('LOCALHOST','localhost');
define('USER','root');
define('PASSWORD','123456');
define('DBNAME','hairoil');
$con=mysqli_connect(LOCALHOST,USER,PASSWORD,DBNAME) or die(mysqli_error());
?>