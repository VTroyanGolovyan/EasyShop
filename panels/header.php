<header>
   <span class = "logo">Магазин</span>
   <div class = "headerButtons">
     <a href = "?service=main">
       Главная
     </a>
     <?php if (! isset($_SESSION[$host]['access']) ){ ?>
       <a href = "?service=login">
           Войти
       </a>
       <a href = "?service=reg">
           Зарегистрироваться
       </a>
     <?php } else { ?>
       <a href = "?service=profile">
           Личный кабинет
       </a>
      <?php
          if ( $_SESSION[$host]['access'] == 255 ){ ?>
              <a href = "?service=addproduct">
                 Добавить товар
             </a>
      <?php } ?>
      <a href = "?cmd=logout">
         Выйти
      </a>
     <?php } ?>
   </div>
</header>
