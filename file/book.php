<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
    <style>
        input, button{
            border-color: blueviolet;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <h3>Вас приветствует книга отзывов!</h3>
    <form m action="comment.php" method="post">
    <label>Введите ваше имя: </label><input type="text"><br><br>
        <textarea name="text" id="text" cols="30" rows="10"></textarea><br><br>
        <p><input type="submit" value="Отправить"></p>
    </form>
</body>
</html>