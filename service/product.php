<main>
  <?php
    $query = 'SELECT * FROM `products` WHERE id ='.(int)$_GET['id'];
    $rez = $mysqli->query($query);
    if ($rez->num_rows != 0){
      $row = $rez->fetch_assoc(); ?>
      <div class = "imageContainer">
         <img onclick = "bigImage(this)" src = "<?php print $row['img']; ?>">
      </div>
      <div class = "aboutP">
         <div class = "productName">
           <?php print $row['name']; ?>
         </div>
         <div class = "sectionAbout">
            <div class = "aboutItem">
              <div>Производитель:</div>
              <div>
                <?php $row['fabricator']; ?>
              </div>
            </div>
            <div class = "aboutItem">
              <div>Сезон:</div>
              <div>
                <?php print $row['season']; ?>
              </div>
            </div>
            <div class = "aboutItem">
              <div>Радиус:</div>
              <div>
                <?php print $row['radius']; ?>
              </div>
            </div>
            <div class = "aboutItem">
              <div>О товаре:</div>
              <div>
                <?php print $row['about']; ?>
              </div>
            </div>
            <div class = "aboutItem">
              <div>Цена:</div>
              <div>
                <?php print $row['price'].'$'; ?>
              </div>
            </div>
            <div class = "calc">
               <h2>Калькулятор погрешности</h2>
               <div>Cтарая шина</div>
               <input oninput = "recalc()" min = "1" placeholder = "Ширина" id = "in1" type = "number" value = "195" >
               <input oninput = "recalc()" min = "1" placeholder = "Высота профиля : Ширина(%)" id = "in2" type = "number"  value = "70">
		           <input oninput = "recalc()" min = "1" placeholder = "Диаметр" id = "in3" type = "number"  value = "15">
               <br>
		        	 <div>Новая шина</div>
		        	 <input oninput = "recalc()" placeholder = "Ширина" id = "in4" type = "number"  value = "245" >
	        		 <input oninput = "recalc()" placeholder = "Высота профиля : Ширина(%)" id = "in5" type = "number"  value = "45">
			         <input oninput = "recalc()" placeholder = "Диаметр" id = "in6" type = "number"  value = "17">
			         <div>Погрешность спидометра:</div>
			         <div id = "out"></div>
            </div>
            <script src = "js/calc.js">      </script>

     <?php if (isset($_SESSION[$host]['access']) && $_SESSION[$host]['access'] == 255){ ?>
		           <a href = "?service=edit&id=<?php print $row['id']; ?>">
		               <div class = "productName">
                     Редактировать
                   </div>
              </a>
	   <?php } ?>
     <?php if (isset($_SESSION[$host]['id'])){ ?>
              <a href = "?cmd=buy&service=profile&productid='<?php print $_GET['id']; ?>'">
     <?php } else { ?>
              <a href = "?service=login">
     <?php } ?>
                  <div class = "productName">
                      Заказать
                  </div>
             </a>
      </div>
    <div class = "sectionAbout">
       <?php include_once('panels/coments.php'); ?>
    </div>
  </div>
    <?php } ?>
</main>
