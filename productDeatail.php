<?php

global $con;
include "connection.php";

 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    if(isset($_GET['id'])){
    $id = $_GET['id'];

    // var_dump($_GET);

    $sqlProductDetail = "SELECT * FROM products
          INNER JOIN category ON products.category_id = category.id
          INNER JOIN  image  ON products.image_id  = image.id 
          WHERE image_id=$id"; 

    $result = $con->query($sqlProductDetail);
    if($result->num_rows > 0 ){
        while($row = $result->fetch_assoc()){
            $image_1 = $row['product_image'];
            $name = $row['product_name'];

            echo"<img src='$image_1' alt='' height='50px';>


                <h1>$name</h1>
            
            ";
            

            
        }   
    }
 }

    ?>
</body>
</html>