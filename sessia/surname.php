<?php
session_start();
require_once "posechenie.php";

if (isset($_POST)) {
  $_SESSION["name"] = $_POST['name'];
}

$pos = $_SESSION['sites'];
$pos[] = $_SERVER['SCRIPT_FILENAME'];
$_SESSION['sites'] = $pos;


?>

<!DOCTYPE html>
<html>

<head>
  <title>Фамилия</title>
  <meta charset="utf-8" />
</head>
<body></body>
    <form action='age.php' method="post">
      <label>Введите вашу фамилию: </label>
      <br /><input name='surname' id="surname" type='text' />
    </form>
    <?php
    posechenie();
    ?>
</body>

</html>
