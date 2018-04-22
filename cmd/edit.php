<?php

  if (isset($_GET['id'])){
	  $id = $_GET['id'];
  }else $id = 1;
  $query = 'SELECT * FROM `products` WHERE id ='.(int)$id.' LIMIT 1';
  $rez = $mysqli->query($query);
  if($rez->num_rows != 0){
	  $row = $rez->fetch_assoc();
      if (! empty($_FILES['image']['name'])){
        if($_FILES['image']['error'] == 0){
          if(substr($_FILES['image']['type'],0,5)=='image'){
		    unlink($row['img']);
            $image = new image_worker($_FILES['image']['tmp_name']);
            $image->load();
            $image->crop(1024,768);
            $filenew = 'img/products/'.md5(time());
            $filenew = $image->save($filenew);
            $query  = 'UPDATE `products` SET img = "'.$filenew.'" WHERE id ='.$row['id'];
            $mysqli->query($query);
	      }
	    }
     }

   }
   if (isset($_POST['name']) && isset($_POST['season']) && isset($_POST['radius']) && isset($_POST['fabricator']) && $_POST['about'] && isset($_POST['price'])){
      $query  = 'UPDATE `products` SET name = "'.htmlspecialchars($_POST['name']).'" , season = "'.htmlspecialchars($_POST['season'])
                   .'" , radius = "'.htmlspecialchars($_POST['radius']).'" , fabricator = "'.htmlspecialchars($_POST['fabricator']).'" , about = "'.htmlspecialchars($_POST['about']).'" ,  price = "'.htmlspecialchars($_POST['price']).'" WHERE id ='.$row['id'];
	  $mysqli->query($query);
   }
?>
