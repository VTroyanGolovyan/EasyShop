<?php
   if (isset($_GET['id'])){
      if (isset($_SESSION[$host]['id'])){  ?>
        <form class = "comentForm" method = "POST" action = "?cmd=addcoment&service=product&id=<?php print (int)$_GET['id']; ?>">
          <input placeholder = "Введите коментарий" class = "input" type = "text" name="coment">
          <input class = "submit" type = "submit" value = "Прокоментировать">
        </form>
<?php
      }else { ?>
        <div class = "coment">
          Вы не авторизированы и не можете оставлять коментарии
        </div>
<?php
      }
      $query = 'SELECT * FROM `coments` INNER JOIN `users` ON `coments`.user = `users`.id WHERE `coments`.mangaid='.(int)$_GET['id'].' ORDER BY `coments`.datetime DESC LIMIT 15';
      $rez = $mysqli->query($query);
      if ($rez->num_rows != 0){
         while( $row = $rez->fetch_assoc()){ ?>
            <div class = "coment">
              <div class = "miniAvatar">
                <a href = "?service=profile&user=<?php print $row['user']; ?>">
                  <?php if ($row['avatar'] != ""){ ?>
                           <img width = "50px" src = "<?php print $row['avatar']; ?>">
                  <?php }else{ ?>
                          <img  width = "50px" src = "img/avatars/defolt.jpg">
                  <?php } ?>
                </a>
             </div>
             <div class = "comentContent">
               <div>
                  <?php print $row['name'].' '.$row['last_name']; ?>
               </div>
               <div>
                  <?php print   $row['text']; ?>
               </div>
             </div>
           </div>
    <?php  }
      }else{
        if (isset($_SESSION[$host]['id'])){ ?>
           <div class = "coment">
            Коментарии отсутствуют, станьте первым!
           </div>
  <?php } ?>
<?php  } ?>
<?php }?>
