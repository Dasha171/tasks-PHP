<?php
$dt = date("l jS \of F Y h:i:s A");
$page = $_SERVER['REQUEST_URI'];
$ref = $_SERVER['HTTP_REFERER'];
$path = "$dt|$page|$ref\n\n";
file_put_contents('log/path.log', $path, FILE_APPEND);
?>
