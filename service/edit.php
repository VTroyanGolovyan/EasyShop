<?php
  if (isset($_GET['id'])){
	  $id = $_GET['id'];
  }else $id = 1;
  if (isset($_GET['type']))
    $type = (int)$_GET['type'];
  else $type = 0;
  if ($type == 0)
    $query = 'SELECT * FROM `products` WHERE id ='.(int)$id.' LIMIT 1';
  else  $query = 'SELECT * FROM `users` WHERE id ='.(int)$id.' LIMIT 1';
  $rez = $mysqli->query($query);
  if($rez->num_rows != 0){
	  $row = $rez->fetch_assoc();
     if ($type == 0){
?>
<main>
  <div class="reg">
    <h2>Отредактировать</h2>
     <form enctype="multipart/form-data" method = "POST" enctype="multipart/form-data" action="?cmd=edit&id=<?php print $id; ?>&service=product">
        <input type = "text" placeholder="Название продукта" name = "name" value = "<?php print $row['name']; ?>">
        Сезон: <select placeholder="Сезон" name = "season">
                 <option><?php print $row['season']; ?></option>
                 <option>Зима</option>
                 <option>Лето</option>
              </select>
        <input type = "text" placeholder="Производитель" name = "fabricator" value = "<?php print $row['fabricator']; ?>">
        <input min = "1" type = "number" placeholder="Радиус" name = "radius" value = "<?php print $row['radius']; ?>">
        <input min = "1" type = "number" placeholder="Цена" name = "price" value = "<?php print $row['price']; ?>">
        Изображение: <input type = "file" name = "image">
        <textarea name = "about" placeholder="Описание"><?php print $row['about']; ?></textarea>
        <input class="submit" type = "submit" value = "Сохранить изменения">
     </form>
   </div>
</main>
<?php } else { ?>
<main>
  <div class="reg">
    <h2>Редактирование профиля</h2>
    <form method = "POST" action = "?cmd=editprofile&service=profile">
       <input type="text" name = "name" placeholder="Имя" value = "<?php print $row['name']; ?>">
       <br>
       <input type="text" name = "last_name" placeholder="Фамилия" value = "<?php print $row['last_name']; ?>">
       <br>
       <input type="text" type="email" name = "email" placeholder="Почта" value = "<?php print $row['email']; ?>">
       <br>
       <input type="text" name = "phone" placeholder="Телефон" value = "<?php print $row['phone']; ?>">
       <br>
       <input type="text" name = "country" placeholder="Страна" value = "<?php print $row['country']; ?>">
       <br>
       <input type="text" name = "city" placeholder="Город" value = "<?php print $row['city']; ?>">
       <br>
       <input class = "submit" type="submit" value="Изменить">
    </form>

  </div>
</main>

  <?php } ?>
<?php }?>
