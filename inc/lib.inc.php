<?php
	function drawTable($cols, $rows, $color) {
        echo "<table border='1' width='200'>";
        for ($i = 1; $i <= $cols; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= $rows; $j++) {
                if ($i == 1 || $j == 1) {
                    echo "<td style='text-align: center; background-color: $color;'><b>" . $i * $j . "</b></td>";
                } else {
                    echo "<td>" . $i * $j . "</td>";
                }
            }
            echo "</tr>";
        }
    }
    

function drawMenu($menu, $vertical=true) {
    echo "<ul>";
    if ($vertical === false) {
    foreach ($menu as $link) {
    echo "<li style='display: inline'>";
        echo "<a href='{$link['href']}'> {$link['link']} </a>";
        echo "</li>";
    }
    } else {
    foreach ($menu as $link) {
    echo "<li>";
        echo "<a href='{$link['href']}'> {$link['link']} </a>";
        echo "</li>";
    }
    }
    echo "</ul>";
}
?>


	

