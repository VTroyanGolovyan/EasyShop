<?php
   if (isset($_POST['email']) && isset($_POST['password'])){
     $query = 'SELECT * FROM `users` WHERE email="'.$_POST['email'].'" LIMIT 1';
     $rez = $mysqli->query($query);
     if ($rez->num_rows != 0){
       $row = $rez->fetch_assoc();
       if ($row['password'] == md5(md5($_POST['password']))){
         $_SESSION[$host]['id'] = $row['id'];
         $_SESSION[$host]['access'] = $row['access'];
       } else  {
         refresh('?service=login&err=4');
       }
     }else{
        refresh('?service=login&err=5');
      exit;
     }
   }else  refresh('?service=login&err=2');
 ?>
