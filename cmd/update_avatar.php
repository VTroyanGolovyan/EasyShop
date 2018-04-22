<?php
  if (! empty($_FILES['avatar']['name'])){
    if($_FILES['avatar']['error'] == 0){
      if(substr($_FILES['avatar']['type'],0,5)=='image'){
        $image = new image_worker($_FILES['avatar']['tmp_name']);
        $image->load();
        $image->crop(600,600);
        $filenew = 'img/avatars/img_'.time();
        $filenew = $image->save($filenew);
        $query = 'SELECT id,avatar FROM `users` WHERE id = '.$_SESSION[$host]['id'];
        $rez = $mysqli->query($query);
        if (!$rez->num_rows === 0){
            $row = $rez->fetch_assoc();
            @unlink($row['avatar']);
        }
        $query = 'UPDATE `users` SET `avatar`="'.$filenew.'" WHERE `id` = '.$_SESSION[$host]['id'];
        $mysqli->query($query);
      }
    }
  }
?>
