<?php
$host="localhost";
$user="root";
$pass="";
$database="bases2";

$link=mysql_connect($host, $user, $pass);
mysql_select_db($database,$link) OR DIE ("Error: Imposible Conectar");

?>