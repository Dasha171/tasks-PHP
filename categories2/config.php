<?php
//  $dbname = "kinotower";
//  $user = "dasha_categories";
//  $password = "";
//  $db = "mysql:host=localhost;dbname=$dbname;";
//  //dsn
 
//  $conn = new PDO($db, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
//   //pdo
//   if ($conn === false) {
//       die("ошибка");
//   }
try {
  // подключаемся к серверу
  $conn = new PDO("mysql:host=localhost;dbname=kinotower", "root", "");
   
  // SQL-выражение для создания таблицы
  $sql = "create table users (id integer auto_increment primary key, name varchar(150) not null, parent_id integer foreign key null, deleted_at datetime null);";
  // выполняем SQL-выражение
  $conn->exec($sql);
  echo "Table Users has been created";
}
catch (PDOException $e) {
  echo "Database error: " . $e->getMessage();
}

  function create_category($name, $parent_id) {
    global $conn;
    $sql = "INSERT INTO categories (name, parent_id) VALUES (:name, :parent_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':name',$name);
    $stmt->bindValue(':parent_id',$parent_id);

    $stmt->execute();

}
function get_categories() {
    global $conn;
    $query = "SELECT * FROM categories WHERE deleted_at IS NULL";
    $stmt = $conn -> prepare($query);

    $stmt -> execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function delete_category($id) {

    global $conn;
    $sql = "DELETE FROM categories WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id',$id);

    $stmt->execute();
    return true;
}
function place_categories() {
    $categories = get_categories();
    if ($categories) {
        foreach ($categories as $category) {
            $name = $category['name'];
            $id = $category['id'];
            echo "<option value='$id'>$name</option>";
        }
    } else {
        echo 'нет категорий';
    }
}
?>