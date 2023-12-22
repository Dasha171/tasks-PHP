<?php
$fl = "log/path.log";

if (!file_exists($fl)) {
    echo "Файл не существует";
}
    $sod = file_get_contents($fl);
    $a = explode("\n", $sod);
          echo "<ul>";
foreach ($a as $vivod) {
    echo "<li>$vivod</li>";
}

echo "</ul>"."\n";
?>
