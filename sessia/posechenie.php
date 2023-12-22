<?php
function posechenie(): void
{
      echo 'Сайт посещался';
    foreach ($_SESSION['sites'] as $site) {
        echo "<h1>$site</h1>";
    }


}
?>