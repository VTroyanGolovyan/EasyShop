<main>
  <div class = "reg">
    <h2>Авторизация</h2>
    <form method = "POST" action = "?cmd=login&service=profile">
       <input type = "email" name = "email" placeholder = "Почта" required>
       <input type = "password" name = "password" placeholder = "Пароль" required>
       <input class = "submit" type = "submit" value = "Войти">
    </form>
    <?php if (isset($_GET['err'])){ ?>
        <div class = "error">
           <?php
                switch ($_GET['err']){
                  case 4:
                      print 'Неверный пароль';
                    break;
                  case 5:
                        print 'Неверный email';
                    break;
                  default:

                    break;
                }
           ?>
        </div>
    <?php }?>
    <div>
      <a href = "?service=reg">Еще не зарегистрированы? Зарегистрируйтесь!</a>
    </div>
  </div>
</main>
