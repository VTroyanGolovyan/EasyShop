<main>
<?php
  $query = 'SELECT * FROM `products` WHERE `name` LIKE "%'.$_POST['name'].'%"';
  $rez = $mysqli->query($query);
  if ($rez->num_rows != 0){
    while ($row = $rez->fetch_assoc()){ ?>
      <div class = "product">
         <a href = "?service=product&id=<?php print $row['id']; ?>">
             <div class = "productHeader">
                 <div>
                    <?php print $row['name']; ?>
                 </div>
                 <div>
                    <?php print $row['price']."$"; ?>
                </div>
             </div>
             <div>
               <img class = "productImage" src = "<?php print $row['img']; ?>">
             </div>
         </a>
      </div>
   <?php } ?>
<?php  }else print 'Ничего не найдено';  ?>
</main>
