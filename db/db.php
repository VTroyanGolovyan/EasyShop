<?php
 $host = 'localhost';
 $user_name = 'root';
 $password = 'root';
 $table = 'shop';
 $mysqli = new mysqli($host, $user_name, $password, $table);
 $mysqli->query("set character_set_client='utf8'");
 $mysqli->query("set character_set_results='utf8'");
 $mysqli->query("set collation_connection='utf8_bin'");
?>
