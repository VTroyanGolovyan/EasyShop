<main>
  <div class="reg">
    <h2>Добавить товар</h2>
     <form enctype="multipart/form-data" method = "POST" enctype="multipart/form-data" action="?cmd=addproduct">
        <input type = "text" placeholder="Название продукта" name = "name" required>
        Сезон: <select placeholder="Сезон" name = "season">
                 <option>Зима</option>
                 <option>Лето</option>
              </select>
        <input type = "text" placeholder="Производитель" name = "fabricator" required>
        <input min = "1" type = "number" placeholder="Радиус" name = "radius" required>
        <input min = "1" type = "number" placeholder="Цена" name = "price" required>
        Изображение: <input type = "file" name = "image" required>
        <textarea name = "about" placeholder="Описание" required></textarea>
        <input class="submit" type = "submit" value = "Добавить">
     </form>
   </div>
</main>
