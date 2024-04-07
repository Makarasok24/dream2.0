<?php
include "connection.php";

if(isset($_POST["submit"])){

   $first_name = $_POST["first_name"];
   $last_name = $_POST["last_name"];
   $email = $_POST["email"];
   $username = $_POST["username"];
   $type_user = $_POST["type_user"];
   $password = $_POST['password'];
   $cpassword = $_POST['cpassword'];  
   
   if($password == $cpassword){

      $password = md5($password); #fetch from user input and encrypt it

      $sql = "INSERT INTO user(first_name,last_name,email,username,`password`,`type_user`) VALUES(?,?,?,?,?,?)";
      $stmt = $con->prepare($sql);
      $stmt->bind_param("ssssss", $first_name,$last_name,$email,$username,$password,$type_user);
      $stmt= $stmt->execute();
      header('location:login.php');
    } else{
      echo"<script>alert('Add new user failed! Password not matching')</script>";
    }

   
   
}

?>