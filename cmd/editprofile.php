<?php
   if (isset($_POST['name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['phone']) 
        && isset($_POST['country']) && isset($_POST['city'])){
	   $name = htmlspecialchars(trim($_POST['name']));
	   $last_name = htmlspecialchars(trim($_POST['last_name']));
	   $email = htmlspecialchars(trim($_POST['email']));
	   $phone = htmlspecialchars(trim($_POST['phone']));
	   $country = htmlspecialchars(trim($_POST['country']));
	   $city = htmlspecialchars(trim($_POST['city']));
	   $query = 'UPDATE `users` SET name = "'.$name.'" , last_name = "'.$last_name.'" , email = "'.$email.'" , phone = "'.$phone.'" , country = "'.$country.'" , city = "'.$city.'" WHERE id='.$_SESSION[$host]['id'];
	   $mysqli->query($query);
   }
?>
