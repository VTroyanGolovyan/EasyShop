<main>
	<div class = "sectionAboutBig">
<?php
        $query = 'SELECT * FROM `orders` INNER JOIN `products` ON `orders`.product = `products`.id';
        $rez = $mysqli->query($query);
        if ($rez->num_rows != 0){       ?>
          <div class = "productName">
            Заказы
          </div>
          <div class = "productName">
            <div class = "aboutItem3">
              <div>Название продукта</div>
              <div>Цена</div>
              <div>Пользователь</div>
            </div>
          </div>
<?php     while ($row = $rez->fetch_assoc()){ ?>
            <div class = "aboutItem3">
              <div><?php print $row['name']; ?> </div>
              <div><?php print $row['price'].'$'; ?></div>
              <div>
                <a href = "?service=profile&user=<?php print $row['user']; ?>">
									  Заказчик
                </a>
              </div>
            </div>
<?php     } ?>
<?php  }  ?>
  </div>
</main>
