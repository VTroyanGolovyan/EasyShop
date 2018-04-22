<?php
if (isset($_POST['email']) && isset($_POST['password'])){
  $query = 'SELECT * FROM `users` WHERE email="'.$_POST['email'].'" LIMIT 1';
  $rez = $mysqli->query($query);
  if ($rez->num_rows != 0){
    $row = $rez->fetch_assoc();
    if ($row['password'] == md5(md5($_POST['password']))){
      $_SESSION[$host]['id'] = $row['id'];
      $_SESSION[$host]['access'] = $row['access'];
    }else{
		    refresh('?service=reg&err=3');
    }
}else if (isset($_POST['name']) && isset($_POST['last_name']) && isset($_POST['password'])
          && isset($_POST['email']) && isset($_POST['country']) && isset($_POST['city'])  && isset($_POST['phone']) ){
        $password = md5(md5(trim($_POST['password'])));
        $name = htmlspecialchars(trim($_POST['name']));
        $last_name = htmlspecialchars(trim($_POST['last_name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $country = htmlspecialchars(trim($_POST['country']));
        $city =  htmlspecialchars(trim($_POST['city']));
        $phone =  htmlspecialchars(trim($_POST['phone']));
        if ($password != '' && strlen($_POST['password']) >= 6 &&
             $name != '' && $last_name != '' && $email != '' && $country != '' && $city != '' && $phone != ''){
	     		$query = 'INSERT INTO `users` (id,name,last_name,country,city,email,phone,access,password,avatar) VALUES (NULL,"'.$name.'","'.$last_name.'","'.$country.'","'.$city.'","'.$email.'","'.$phone.'",10,"'.$password.'","")';
          $mysqli->query($query);
          include 'cmd/login.php';
	    	} else refresh('?service=reg&err=1');
      } else refresh('?service=reg&err=2');
  } else  refresh('?service=reg&err=2');
 ?>
