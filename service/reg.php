<main>
  <div class="reg">
    <h2>Регистрация</h2>
    <form method = "POST" action = "?cmd=reg&service=profile">
       <input type = "text" name = "name" placeholder = "Имя" required>
       <br>
       <input type = "text" name = "last_name" placeholder = "Фамилия" required>
       <br>
       <input type = "text" name = "country" placeholder = "Страна" required>
       <br>
       <input type = "text" name = "city" placeholder = "Город" required>
       <br>
       <input type = "tel" name = "phone" placeholder = "Телефон" required>
       <br>
       <input type = "email" name = "email" placeholder = "Почта" required>
       <br>
       <input type = "password" name = "password" placeholder = "Пароль" required>
       <br>
       <input class = "submit" type="submit" value="Зарегистрироваться">
    </form>
    <?php if (isset($_GET['err'])){ ?>
        <div class = "error">
           <?php
                switch ($_GET['err']){
                  case 1:
                      print 'Короткий пароль (мин 6 симв)';
                    break;
                  case 2:
                        print 'Заполните все поля';
                    break;
                  case 3:
                        print 'Пользователь с таким адресом существует но пароль неверный';
                    break;
                  default:

                    break;
                }
           ?>
        </div>
    <?php }?>
    <div>
      <a href = "?service=login">Уже зарегистрированы? Авторизируйтесь!</a>
    </div>
  </div>
</main>
