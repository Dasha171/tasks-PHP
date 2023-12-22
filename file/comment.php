
<?php
session_start();

if (isset($_POST)) {
    $_SESSION["text"] = $_POST['text'];
  }
  $name = $_SESSION["text"];
  $date = date("F j, Y, g:i a");
echo "Ваш отзыв: $name  +  $date";
$fd = fopen("book.php", 'a+') or die("не удалось открыть файл");
fclose($fd);
echo " Файлы отфильтрованы и записаны <br> ";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>