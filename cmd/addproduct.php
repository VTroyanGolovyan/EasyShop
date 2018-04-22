<?php
if (! empty($_FILES['image']['name'])){
if($_FILES['image']['error'] == 0){
    if(substr($_FILES['image']['type'],0,5)=='image'){
      $image = new image_worker($_FILES['image']['tmp_name']);
      $image->load();
      $image->crop(1024,768);
      $filenew = 'img/products/'.md5(time());
      $filenew = $image->save($filenew);
      $query = 'INSERT INTO `products` (id,name,season,radius,fabricator,about,img,price) VALUES (NULL,"'.$_POST['name'].'","'.$_POST['season'].'",'.$_POST['radius'].',"'.$_POST['fabricator'].'","'.$_POST['about'].'","'.$filenew.'",'.$_POST['price'].')';
      $mysqli->query($query);
      print $mysqli->error;
    }
}
}
?>
