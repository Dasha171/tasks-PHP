<?php
session_start();
require_once "posechenie.php";

$name = $_SESSION["name"];
$surname = $_SESSION["surname"];
$_SESSION["age"] = $_POST['age'];
$age = $_SESSION["age"];
echo "Ваше имя: $name <br> Ваша фамилия: $surname <br>  Ваш возраст: $age";


$pos = $_SESSION['sites'];
$pos[] = $_SERVER['SCRIPT_FILENAME'];
$_SESSION['sites'] = $pos;
?>

<!DOCTYPE html>
<html>
<head>
  <title>Данные</title>
  <meta charset="utf-8" />
</head>
<body>
      <br>
      <?php
    posechenie();
    ?>
</body>

</html>