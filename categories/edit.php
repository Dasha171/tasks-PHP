<?php
require_once "config.php";

$name = $parent_id = $deleted = "";
$name_error = $parent_id_error = $deleted_at_error  = "";

if (isset($_POST["id"]) && !empty($_POST["id"])) {
    $id = $_POST["id"];
        $firstName = trim($_POST["name"]);
        if (empty($firstName)) {
            $name_error = "First Name is required.";
        } elseif (!filter_var($firstName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))) {
            $name_error = "ошибка";
        } else {
            $firstName = $firstName;
        }
        $lastName = trim($_POST["parent_id"]);

        if (empty($lastName)) {
            $parent_id_error = "ошибка";
        } elseif (!filter_var($firstName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))) {
            $parent_id_error = "ошибка";
        } else {
            $lastName = $lastName;
        }
        $deleted = trim($_POST["deleted_at"]);
        if (empty($deleted)) {
            $deleted_error = "deleted is required.";
        } elseif (!filter_var($firstName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))) {
            $deleted_error = "ошибка";
        } else {
            $deleted = $deleted;
        }
    if (empty($name_error_err) && empty($parent_id_error) &&
        empty($deleted_error) && empty($phone_number_error) && empty($address_error) ) {

          $sql = "UPDATE `dasha_categories` SET `name`= '$firstName', `parent_id`= '$lastName', `deleted`= '$deleted' WHERE id='$id'";

          if (mysqli_query($conn, $sql)) {
              header("location: index.php");
          } else {
              echo "ошибка";
          }
    }
    mysqli_close($conn);
} else {
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        $id = trim($_GET["id"]);
        $query = mysqli_query($conn, "SELECT * FROM dasha_categories WHERE ID = '$id'");

        if ($user = mysqli_fetch_assoc($query)) {
            $firstName   = $user["name"];
            $lastName    = $user["parent_id"];
            $deleted       = $user["deleted"];
        } else {
            echo "ошибка";
            header("location: edit.php");
            exit();
        }
        mysqli_close($conn);
    }  else {
        echo "ошибка";
        header("location: edit.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Редактировать</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Редактировать</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                      <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <div class="form-group <?php echo (!empty($name_error)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $firstName; ?>">
                            <span class="help-block"><?php echo $name_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($parent_id_error)) ? 'has-error' : ''; ?>">
                            <label>parent_id</label>
                            <input type="text" name="parent_id" class="form-control" value="<?php echo $lastName; ?>">
                            <span class="help-block"><?php echo $parent_id_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($deleted_error)) ? 'has-error' : ''; ?>">
                            <label>deleted_at</label>
                            <input type="deleted" name="deleted" class="form-control" value="<?php echo $deleted; ?>">
                            <span class="help-block"><?php echo $deleted_error;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Создать">
                        <a href="index.php" class="btn btn-default">Назад</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
