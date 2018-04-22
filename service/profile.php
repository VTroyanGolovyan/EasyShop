<main>

    <div class = "imageContainer">
    <?php
	   if (!isset($_GET['user'])){
        if ( isset($_SESSION[$host]['id']))
         $userid = $_SESSION[$host]['id'];
        else  $userid = 1;
       }else $userid = $_GET['user'];
       $query = "SELECT * FROM `users` WHERE id=".$userid;
       $rez = $mysqli->query($query);
       $row = $rez->fetch_assoc();
       if ( isset($_SESSION[$host]['id']) && $row['id'] == $_SESSION[$host]['id']){
     ?>
      <form enctype="multipart/form-data" method = "POST" action = "?cmd=update_avatar&service=profile">
        <input type = "file" name = "avatar">
        <input type = "submit" value = "Поменять">
      </form>
    <?php } ?>
  <?php
        if ($row['avatar'] != ''){ ?>
           <img onclick = "bigImage(this)" src = "<?php print $row['avatar']; ?>">
  <?php } else { ?>
           <img onclick = "bigImage(this)" src = "img/avatars/defolt.jpg">
  <?php } ?>
    </div>
    <div class = "aboutP">
      <div class = "productName">
        <?php print $row['name'].' '.$row['last_name']; ?>
      </div>
      <div class = "sectionAbout">
        <div class = "aboutItem">
          <div>Почта:</div>
          <div>
            <?php print $row['email']; ?>
          </div>
       </div>
       <div class = "aboutItem">
         <div>Телефон:</div>
         <div>
           <?php print $row['phone']; ?>
         </div>
       </div>
       <div class = "aboutItem">
         <div>Страна:</div>
         <div>
           <?php print $row['country']; ?>
         </div>
       </div>
       <div class = "aboutItem">
         <div>Город:</div>
         <div>
           <?php print $row['city']; ?>
         </div>
       </div>
     </div>
     <?php  if ( isset($_SESSION[$host]['id']) && $row['id'] == $_SESSION[$host]['id']){  ?>
     <div class = "productName">
       <a href = "?service=edit&type=1&id=<?php print $row['id']; ?>">
         Редактировать информацию
       </a>
     </div>
   <?php } ?>
<?php if (isset($_SESSION[$host]['id']) && $_SESSION[$host]['access'] == 255 && $row['id'] == $_SESSION[$host]['id']){ ?>
	   <div class = "productName">
		   <a href = "?service=orders">
          Заказы пользователей
       </a>
     </div>
<?php  } ?>
<?php if ((isset($_SESSION[$host]['id']) && $row['id'] == $_SESSION[$host]['id'] ) ||
           (isset($_SESSION[$host]['id']) && $_SESSION[$host]['access'] == 255)){
		$query = 'SELECT * FROM `orders` INNER JOIN `products` ON `orders`.product = `products`.id WHERE user='.$row['id'];
        $rez = $mysqli->query($query);
        if ($rez->num_rows != 0){ ?>
          <div class = "productName">
            Заказы
          </div>
          <div class = "productName">
            <div class = "aboutItem2">
              <div>Название продукта</div>
              <div>Цена</div>
            </div>
          </div>
          <div class = "productName">
    <?php while ($row = $rez->fetch_assoc()){ ?>
            <div class = "aboutItem2">
              <div><?php print $row['name']; ?></div>
              <div><?php print $row['price'].'$'; ?></div>
            </div>
    <?php } ?>
          </div>
        </div>
  <?php } ?>
<?php  } ?>

</main>
