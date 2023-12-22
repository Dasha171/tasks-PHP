<?php
require_once "config.php";

$name = $parent_id  = $deleted_at = "";
$name_error = $parent_id_error = $deleted_at_error  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim($_POST["name"]);
    if (empty($firstName)) {
        $name_error = "ошибка";
    } elseif (!filter_var($firstName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))) {
        $name_error = "ошибка";
    } else {
        $firstName = $firstName;
    }

    $lastName = trim($_POST["parent_id "]);

    if (empty($lastName)) {
        $parent_id_error = "ошибка";
    } elseif (!filter_var($firstName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))) {
        $parent_id_error = "ошибка";
    } else {
        $lastName = $lastName;
    }

    $deleted_at = trim($_POST["deleted_at"]);
    if (empty($deleted_at)) {
        $deleted_at_error = "ошибка";
    } elseif (!filter_var($firstName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))) {
        $deleted_at_error = "ошибка";
    } else {
        $deleted_at = $deleted_at;
    }
    //PDO
    if (empty($name_error) && empty($parent_id_error) && empty($deleted_at_error)) {
          $sql = "INSERT INTO `dasha_categories` (`name`, `parent_id` , `deleted_at`) VALUES ('$firstName', '$lastName', '$deleted_at')";

          if (mysqli_query($conn, $sql)) {
              header("location: index.php");
          } else {
               echo "ошибка";
          }
      }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Создать</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Создать</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_error)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="">
                            <span class="help-block"><?php echo $name_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($parent_id_error)) ? 'has-error' : ''; ?>">
                            <label>parent_id</label>
                            <input type="text" name="parent_id " class="form-control" value="">
                            <span class="help-block"><?php echo $parent_id_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($deleted_at_error)) ? 'has-error' : ''; ?>">
                            <label>deleted_at</label>
                            <input type="deleted_at" name="deleted_at" class="form-control" value="">
                            <span class="help-block"><?php echo $deleted_at_error;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Назад</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>