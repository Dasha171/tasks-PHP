<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Просмотр</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"><!--таблица стилей взята с сайта-->
    
</head>
<body>
  <?php
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        require_once "config.php";
        $id = trim($_GET["id"]);
        $query = mysqli_query($conn, "SELECT * FROM dasha_categories WHERE ID = '$id'");
        if ($user = mysqli_fetch_assoc($query)) {
            $firstName   = $user["name"];
            $lastName    = $user["parent_id"];
            $deleted       = $user["deleted"];
        } else {
            header("location: read.php");
            exit();
        }
        mysqli_close($conn);
    } else {
        header("location: read.php");
        exit();
    }
  ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Просмотр файла</h1>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <p class="form-control-static"><?php echo $firstName ?></p>
                    </div>
                    <div class="form-group">
                        <label>parent_id</label>
                        <p class="form-control-static"><?php echo $lastName ?></p>
                    </div>
                    <div class="form-group">
                        <label>deleted_at</label>
                        <p class="form-control-static"><?php echo $email ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Назад</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>