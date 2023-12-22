<?php
/* Основные настройки */
 define('DB_HOST', 'localhost');
define('DB_LOGIN', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'gbook');
$conn = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
if ($conn === false) {
    die("ошибка" . mysqli_connect_error());
}
/* Основные настройки */

/* Сохранение записи в БД */
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST)) {
        $name = $_POST['name'] ?? "null";
        $email = $_POST['email'] ?? "null";
        $msg = $_POST['msg'] ?? "null";
        $_POST = array();
        $sql = mysqli_query($conn, "INSERT INTO msgs (name, email, msg) VALUES ('$name', '$email', '$msg')");    }
}
/* Сохранение записи в БД */

/* Удаление записи из БД */
if(isset($_GET)){
   strip_tags($msg = $_GET['msg']); 
   $delete = mysqli_query($conn, "DELETE FROM msgs WHERE id = $del");
}


/* Удаление записи из БД */
?>
<h3>Оставьте запись в нашей Гостевой книге</h3>

<form method="post" action="<?=$_SERVER['REQUEST_URI']?>">
Имя: <br /><input type="text" name="name" /><br />
Email: <br /><input type="text" name="email" /><br />
Сообщение: <br /><textarea name="msg"></textarea><br />
<br />
<input type="submit" value="Отправить!" />
</form>
<?php
/* Вывод записей из БД */
$zapros = " SELECT id, name, email, msg, UNIX_TIMESTAMP(datetime) as dt
   FROM msgs
   ORDER BY id DESC";

$resultat = mysqli_query($conn, $zapros);
$all = mysqli_fetch_all($resultat);
mysqli_close($conn);
$cout = count($all);
$date = date('l jS \of F Y h:i:s A');
echo "<p>Всего записей в гостевой книге: $cout . $date </p>";
foreach($all as $arr){
    $id = $arr['id'];
    $name = $arr['name'];
    $email = $arr['email'];
    $msg = $arr['msg'];

    echo "<p> 
    <a href='$email'>$name</a>
    $id, $name, $email, $msg <p>";
 
    echo "<p align='right'><a href='http://localhost/PHP/siteb2/index.php?id=gbook&del=$id'>Удалить?</a></p>";
}

/* Вывод записей из БД */
?>