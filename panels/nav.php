<nav>
  <form class = "comentForm" method = "post" action="?service=search">
    <?php if (isset($_POST['name'])){ ?>
     <input placeholder="Поиск" value="<?php print htmlspecialchars($_POST['name']); ?>" name = "name" class = "input" type = "text">
   <?php } else { ?>
      <input placeholder="Поиск" name = "name" class = "input" type = "text">
   <?php } ?>
     <input type = "submit" class = "submit" value = "Поиск">
  </form>
<?php  if (isset($_GET['type']) && $_GET['type'] == 1 ){ ?>
  <a class = "act" href = "?service=main&type=1">
<?php } else { ?>
  <a href = "?service=main&type=1">
<?php } ?>
    <div class = "munuItem">Лето</div>
  </a>
<?php  if (isset($_GET['type']) && $_GET['type'] == 2 ){ ?>
  <a class = "act" href = "?service=main&type=2">
<?php } else { ?>
  <a href = "?service=main&type=2">
<?php } ?>
    <div class = "munuItem">Зима</div>
  </a>
</nav>
