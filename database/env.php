<?php 

//* Database Host//
define('DB_HOST', 'localhost');
//* Database username//
define('DB_USER', 'root' );
//* Database password//
define('DB_PASSWORD', '');
//* Database name//
define('DB_NAME', 'post_sys');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


?>