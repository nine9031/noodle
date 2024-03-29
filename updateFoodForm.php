<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Update customer </title>
  </head>
  <body>

<?php

    require 'connect.php';

    $sql_select = 'select * from food order by FoodID';
    $stmt_s = $conn->prepare($sql_select);
    $stmt_s->execute();
    echo "FoodID = ".$_GET['FoodID'];

    if (isset($_GET['FoodID'])) {
        $sql_select_customer = 'SELECT * FROM food WHERE FoodID=?';
        $stmt = $conn->prepare($sql_select_customer);
        $stmt->execute([$_GET['FoodID']]);
        echo "get = ".$_GET['FoodID'];
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }

?>

    
<div class="container">
      <div class="row">
        <div class="col-md-4"> <br>
          <h3>ฟอร์มแก้ไขข้อมูลอาหาร</h3>
          <form action="updateFood.php" method="POST">
           <input type="hidden" name="FoodID" value="<?= $result['FoodID'];?>">
            
                <label for="name" class="col-sm-2 col-form-label"> ชื่ออาหาร:  </label>
              
                <input type="text" name="FoodName" class="form-control" required value="<?php echo $result["FoodName"]; ?>">           
           
            
                <label for="name" class="col-sm-2 col-form-label"> ราคา :  </label>
             
                <input type="number" name="FoodPrice" class="form-control" required value="<?php echo $result["FoodPrice"] ?>">
          
            <br> <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
          </form>
        </div>
      </div>
    </div>

  </body>
</html>