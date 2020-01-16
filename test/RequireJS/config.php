<?php
$mysql_hostname = "localhost";
$mysql_user = "admin_vdi";
$mysql_password = "wDC2hSd8Z8";
$mysql_database = "admin_default";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) 
or die("Opps some thing went wrong");
mysql_select_db($mysql_database, $bd) or die("Opps some thing went wrong 1");
?>