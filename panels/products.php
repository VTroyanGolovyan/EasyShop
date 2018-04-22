<?php
if (isset($_GET['type'])){
  if($_GET['type'] == 1){
    $where = ' WHERE season = "Лето" ';
  }else {
    $where = ' WHERE season = "Зима" ';
  }
}else $where = '';
if (isset($_GET['page'])){
  $page = (int)$_GET['page'];
}else $page = 1;
$begin = ($page - 1) * 12;
$end = $page*12;
  $query = 'SELECT * FROM `products` '.$where.' LIMIT '.$begin.','.$end;
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
   <?php
   $query = 'SELECT count(*) FROM `products` '.$where;
   $row = $mysqli->query($query)->fetch_assoc();
   if ($row['count(*)'] % 12 != 0)
      $last = (int)($row['count(*)']/12)+1;
   else $last = (int)($row['count(*)']/12);
   print '<div class = "pageList">';
   for ($i = 1; $i <= $last; $i++){
     if (isset($_GET['type']))
        print '<a href = "?view=main&page='.$i.'&type='.$_GET['type'].'">';
     else print '<a href = "?view=main&page='.$i.'">';
     if ($i == $page)
     print '<div class = "activebutton">';
     else print '<div>';
     print $i;
     print '</div>';
     print '</a>';
   }
   print '</div>';
   ?>
<?php  } ?>
