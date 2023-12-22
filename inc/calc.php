<head>
  <title>Калькулятор</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>

  <div id="header">
    <!-- Верхняя часть страницы -->
    <img src="logo.gif" width="187" height="29" alt="Наш логотип" class="logo" />
    <span class="slogan">приходите к нам учиться</span>
    <!-- Верхняя часть страницы -->
  </div>

  <div id="content">
    <!-- Заголовок -->

</body>
  <div id="nav">
    <h2>Навигация по сайту</h2>
    <!-- Меню -->
    <ul>
      <li><a href='index.php'>Домой</a>
      </li>
      <li><a href='about.php'>О нас</a>
      </li>
      <li><a href='contact.php'>Контакты</a>
      </li>
      <li><a href='table.php'>Таблица умножения</a>
      </li>
      <li><a href='calc.php'>Калькулятор</a>
      </li>
    </ul>
    <!-- Меню -->
  </div>
  <div id="footer">
    <!-- Нижняя часть страницы -->
    &copy; Супер Мега Веб-мастер, 2000 &ndash; 2021
    <!-- Нижняя часть страницы -->
  </div>
  <!-- Область основного контента -->
  <form action="" method=POST> 
  1 число : <input type=text name=aa><br/>
  <br />
  <label>Оператор: </label>
      <br />
      <input name='operator' type='text' />
      <br />
      <br />
   2 число: <input type=text name=b><br/> 
   <br />
   <input type=submit value="Считать"> 
  </form> 
 </body> 
</html>
<?php
  $aa = $_POST['aa'];
  $b = $_POST['b'];
  
  $resultat = $aa . ' ' . $_POST['operator'] . ' ' . $b . ' = ';

switch ($_POST['operator']) {
	case "+": $resultat = $aa + $b;
  break;
	case "-": $resultat = $aa - $b;
   break;
	case "*": $resultat = $aa * $b; 
  break;
	case "/": if ($aa != 0) {
			$resultat = $aa / $b;
		} else { 
			$resultat = "нельзя делить";
		};
		break;
};


echo $resultat;


?>