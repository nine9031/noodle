<?php

require('connect.php');


$sql = "DELETE FROM food WHERE FoodID = :FoodID";
$stml = $conn->prepare($sql);
$stml->bindParam(':FoodID', $_GET["FoodID"]);
 echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
    
if($stml->execute()) :
    
        $message = "Successfully delete customer".$_GET['FoodID'].".";
           echo '
        <script type="text/javascript">
        
 
        
        </script>
        ';


else :
    $message = "Fail to delete customer information.";
endif;
$conn = null;

header("Location:index.php");

?>