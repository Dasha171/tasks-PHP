<?php
require_once "config.php";

$con = mysqli_connect("mysql:host=localhost;dbname=kinotower user=dasha_categories password='';");
//удаление
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $delete = $_POST['deleted_category'];
    echo $delete;
    delete_category($delete);
    $_POST = array();
    $ech = "Удалено";
}
echo $ech;