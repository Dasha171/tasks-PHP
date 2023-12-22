<?php
session_start();
require_once "posechenie.php";
if (!isset($_SESSION['sites'])) {
    $pos = [$_SERVER['script_filename']];
    $_SESSION['sites'] = $pos;
} else {
    $pos = $_SESSION['sites'];
    $pos[] = $_SERVER['SCRIPT_FILENAME'];
    $_SESSION['sites'] = $pos;
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Имя</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style.css" />
</head>
<body>
    <form action='surname.php'  method="post">
      <label>Введите ваше имя: </label>
      <br /><input name='name' id="name" type='text' />
    </form>
    <?php
    posechenie();
    ?>
</body>

</html>