<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '1234');
define('NAME', 'gwc');
#connecting to the database
$conn = mysqli_connect(HOST,USER,PASS,NAME);
if (!$conn) {
	echo "error".mysql_errno();
}

?>
