<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>MySql</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  </head>
  <body>
        <?php          
            require_once "config.php";      
             $data = "SELECT * FROM dasha_categories";
               if($dasha_categories = mysqli_query($conn, $data)){
                if(mysqli_num_rows($dasha_categories) > 0){
                            echo "<table class='table table-bordered table-striped'>
                                    <thead>
                                      <tr>
                                        <th>id</th>
                                        <th>name</th>
                                        <th>parent_id</th>
                                        <th>deleted_at</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>";
                 while($user = mysqli_fetch_array($dasha_categories)) {
                                    echo "<tr>
                                            <td>" . $user['id'] . "</td>
                                            <td>" . $user['name'] . "</td>
                                            <td>" . $user['parent_id'] . "</td>
                                            <td>" . $user['deleted_at'] . "</td>
                                
                                            <td>
                                              <a href='read.php?id=". $user['id'] ."' title='Просмотр' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>
                                              <a href='edit.php?id=". $user['id'] ."' title='Редактировать' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>
                                              <a href='delete.php?id=". $user['id'] ."' title='Удалить' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>
                                            </td>
                                          </tr>";
                                }
                                echo "</tbody>
                                </table>";
                            mysqli_free_result($dasha_categories);
            } else{
                            echo "ошибка";
                        }
           } else{
                        echo "ошибка $sql. " . mysqli_error($conn);
}
                    mysqli_close($conn);
                    ?>
                   <form action="create.php">
                          <button>Создать категорию</button>
                     
                  </form>

                </div>
            </div>
        </div>
    </div>
  </body>
</html>