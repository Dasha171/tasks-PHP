<?php include('lib.inc.php'); ?>
<?php include('data.inc.php'); ?>
<?php


$title = 'Сайт нашей школы';
$header = "$welcome, Гость!";
$id = strtolower(strip_tags(trim($_GET['id'])));
switch($id){
case 'about':
$title = 'О сайте';
$header = 'О нашем сайте';
break;
case 'contact':
$title = 'Контакты';
$header = 'Обратная связь';
break;
case 'table':
$title = 'Таблица умножения';
$header = 'Таблица умножения';
break;
case 'calc':
$title = 'Он-лайн калькулятор';
$header = 'Калькулятор';
break;
}
?>
<!DOCTYPE html>
<html>
<head>
  <?php echo $title?>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<div id="header">
			<!-- Верхняя часть страницы -->
      <?php include('top.inc.php'); ?>
			<!-- Верхняя часть страницы -->
		</div>

		<div id="content">
			<!-- Заголовок -->
			<h1><?=$header?></h1>
			<!-- Заголовок -->
			<blockquote>
				<?
					echo "Сегодня {$day}-{$mon}-{$year}";
				?>
			</blockquote>
				<?php

				switch ($id) {
					case 'about': include 'about.php'; break; 
					case 'contact': include 'contact.php'; break;
					case 'table': include 'table.php'; break;
					case 'calc': include 'calc.php'; break;
					default: include 'index.inc.php'; 
				}
				?>
			<!-- Область основного контента -->
		</div>
		<div id="nav">
			<!-- Навигация -->
      <?php include('menu.inc.php'); ?>
			<!-- Навигация -->
		</div>
		<div id="footer">
			<!-- Нижняя часть страницы -->
      <?php include('bottom.inc.php'); ?>
			<!-- Нижняя часть страницы -->
		</div>
	</body>
</html>