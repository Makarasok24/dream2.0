<?php
    include "../connection.php";
        
        $id = $_GET["Id"];
        $sql = "DELETE FROM products WHERE id = '$id'";
      
        if($result = $con->query($sql)){
            echo "<script>alert('Delete successfull!')</script>";
            header('location: myProduct.php');
        }else{
            echo "<script>alert('Delete not successfull!')</script>";
        }
    
?>