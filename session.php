<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
</head>
<body>
    <h1>Задачи по сесси и куки</h1>
    <?php
    //По заходу на страницу запишите в сессию текст 'test'. Затем обновите страницу и выведите содержимое сессии на экран.
    $_SESSION['text'] = 'test';
    echo $_SESSION['text'];  
    ?>

    <?php 
    //Сделайте счетчик обновления страницы пользователем. Данные храните в сессии. Скрипт должен выводить на экран количество обновлений. При первом заходе на страницу он должен вывести сообщение о том, что вы еще не обновляли страницу.

//     $pos = $_SESSION['sites'];
//     $pos[] = $_SERVER['SCRIPT_FILENAME'];
//     $_SESSION['sites'] = $pos; 
//     $time = date("H:i:s");
//     function posechenie(): void
// {
//       echo 'Сайт посещался' ;
//     foreach ($_SESSION['sites'] as $site) {
//         echo "<h1>$site</h1>";
//     }
// }
// posechenie();
    ?>
    <form action="" method="post">
       <p>Введите ваш email: <input type="text" id="email"></p>
       <button type="submit">Отправить</button>
       <?php 
        //Спросите у пользователя email с помощью формы. Затем сделайте так, чтобы в другой форме 
        //(поля: имя, фамилия, пароль, email) при ее открытии поле email было автоматически заполнено.
       if (isset($_GET['email'])) {
        $email = $_GET['email'];
      } else {
        $email = '';
      }
     ?>
    </form>
    <h2><b>Заполните форму</b></h2>
    <form action="" method="post">
        <p>Имя: <input type="text"></p>
        <p>Фамилия: <input type="text"></p>
        <p>Пароль: <input type="text"></p>
        <p>Email: <input type="text" id="email"></p>
        <button type="submit">Отправить</button>
    </form>

    <?php 
    //По заходу на страницу запишите в куку с именем test текст '123'. Затем обновите страницу и выведите содержимое этой куки на экран.
    $test = 1234;
    setcookie("test", $test);
    if (isset($_COOKIE["test"])) echo "Число: " . $_COOKIE["test"] . "<br>";
    //Удалите куку с именем test
    
    //setcookie ("test", "", time() - 3600);
    ?>

    <?php
    //Сделайте счетчик посещения сайта посетителем. Каждый раз, заходя на сайт, он должен видеть надпись: 'Вы посетили наш сайт % раз!'.
    if (!isset($_COOKIE['Ind_Counter'])) $_COOKIE['Ind_Counter'] = 0;
    $_COOKIE['Ind_Counter']++;
    SetCookie('Ind_Counter', $_COOKIE['Ind_Counter'], 0x6FFFFFFF);
    echo "Посещений сайта - " . $_COOKIE['Ind_Counter'];
    ?>
  <? //Спросите дату рождения пользователя. При следующем заходе на сайт напишите сколько дней осталось до его дня рождения. Если сегодня день рождения пользователя - поздравьте его!?>
    <form action="" method="post">
        <p>Дата вашего дня рождения? <input type="date" name="birthday">
        <input type="submit" value="Отправить">
        <?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $birthday = $_POST['birthday'];
        setcookie('birthday', $birthday, time() + 86400 * 365);
      }

      if (isset($_COOKIE['birthday'])) {
        $birthday = strtotime($_COOKIE['birthday']);
        $today = strtotime('today');
      
        $days_to_birthday = ($birthday - $today) / (60 * 60 * 24);
      
        if ($days_to_birthday == 0) {
          echo 'Сегодня ваш день рождения! Поздравляем!';
        } else {
          echo 'До вашего дня рождения осталось ' . $days_to_birthday . ' дней.';
        }
      }
    ?>
    </form>
</body>
</html>