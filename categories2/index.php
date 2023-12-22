<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>MySql</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  </head>
  <body>
     <?php          
          require_once "config.php";      
            if ($_SERVER['REQUEST_METHOD'] === "POST") {
              if (isset($_POST['category_name'])) {
                  $category_name = $_POST['category_name'];
                  $parent_сategory_id = $_POST['parent_category'] ?? "null";
                  create_category($category_name, $parent_category_id);
                  $_POST = array();
              }
              header('Location: index.php');
          }
          ?>
    <form  action="index.php" method="post">
      <div>
          <label class="block text-gray-700 font-bold mb-2" for="name">
              Введите имя
          </label>
          <input id="name" type="text" placeholder="Имя категории" name = "category_name" value="">
      </div>
      <div>
          <label for="parent_category">
            Все категории
          </label>
           <select id="parent_category" name="parent_category">
              <?php
                place_categories();
              ?>
          </select>
          </select>
              <form action="categories.php" method = "post">
              <br>
              <br>
            <button>Создать категорию</button>
        <?php
       $categor = get_categories();
        if ($categor) {
            foreach ($categor as $category) {
                $id = $category['id'];
                echo '<tr>';
                echo '<td>' . $category['id'] . '</td>';
                echo '<td>' . $category['name'] . '</td>';
                echo '<td>' . $category['parent_id'] . '</td>';
                echo '<td>';
                echo "<button value='$id' name='delete_category'>Удалить</button>";

            }
        } else {
            echo 'нет категорий';
        }
        ?>
</body>
</html>