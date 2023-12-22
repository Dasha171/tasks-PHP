<?php
$leftMenu = [
	['link'=>'Домой', 'href'=>'index.php'],
	['link'=>'О нас', 'href'=>'index.php?id=about'],
	['link'=>'Контакты', 'href'=>'index.php?id=contact'],
	['link'=>'Таблица умножения', 'href'=>'index.php?id=table'],
	['link'=>'Калькулятор', 'href'=>'index.php?id=calc'],
];
$chas = (int) strftime('%H');
$welcome = 'Гость! '; 

if ($chas > 0 && $chas < 6) {
    $welcome = 'Доброй ночи';
}
elseif ($chas >= 6 && $chas < 12) {
    $welcome = 'Доброе утро';
}
elseif ($chas >= 12 && $chas < 18) {
    $welcome = 'Добрый день';
}
elseif ($chas >= 18 && $chas < 23) {
    $welcome = 'Добрый вечер';
}
else {
    $welcome = 'Доброй ночи';
}
echo $welcome;
?>
