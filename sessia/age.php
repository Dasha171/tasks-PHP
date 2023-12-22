<?php
session_start();

require_once "posechenie.php";

if (isset($_POST)) {
  $_SESSION["surname"] = $_POST['surname'];
}

$pos = $_SESSION['sites'];
$pos[] = $_SERVER['SCRIPT_FILENAME'];
$_SESSION['sites'] = $pos;

?>


<!DOCTYPE html>
<html>

<head>
  <title>Возраст</title>
  <meta charset="utf-8" />
</head>
<body>
    <form action='full.php'  method="post">
      <label>Введите ваш возраст: </label>
      <br /><input name='age'id="age" type='text' />
    </form>
    <?php
    posechenie();
    ?>
</body>

</html>