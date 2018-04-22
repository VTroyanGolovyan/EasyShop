<?php
  $query = 'INSERT INTO `orders` (id,user,product) VALUES (NULL,'.$_SESSION[$host]['id'].','.(int)$_GET['productid'].')';
  $mysqli->query($query);

 ?>
