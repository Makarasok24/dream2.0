<?php


include "menu.php";

// if(isset($_POST['submit'])){

//    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
//    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
//    $email = mysqli_real_escape_string($con, $_POST['email']);
//    $pass = md5($_POST['password']);
//    $cpass = md5($_POST['cpassword']);
//    $user_type = $_POST['user_type'];

//    $select = " SELECT * FROM user WHERE email = '$email' && password = '$pass' ";

//    $result = mysqli_query($con, $select);

//    if(mysqli_num_rows($result) > 0){

//       $error[] = 'user already exist!';

//    }else{

//       if($pass != $cpass){
//          $error[] = 'password not matched!';
//       }else{
//          $insert = "INSERT INTO user(first_name, last_name, email, password, type_user) VALUES('$first_name', '$last_name', '$email','$pass','$type_user')";
//          mysqli_query($con, $insert);
//          header('location:login_form.php');
//       }
//    }

// }
?>
<?php

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
  

   }else{
      echo"<script>alert('Add new user failed! Password not matching')</script>";
   }

   
   
}

?>

<div class="container" style="width: 35%;">

   <form action="" method="post">
    
      <div class="mb-3">
      <label for="">FIRSTNAME</label>
      <input type="text" name="first_name" class="form-control" style="border-radius: 0; border:2px solid;" required placeholder="First Name">
      </div>

      <div class="mb-3">
      <label for="">LASTNAME</label>
      <input type="text" name="last_name" class="form-control" style="border-radius: 0; border:2px solid;" required placeholder="First Name">
      </div>

      <div class="mb-3">
      <label for="">USERNAME</label>
      <input type="text" name="username" class="form-control" style="border-radius: 0; border:2px solid;" required placeholder="username">
      </div>
      
      <div class="mb-3">
      <label for="">EMAIL</label>
      <input type="email" name="email" class="form-control" style="border-radius: 0; border:2px solid;"  required placeholder="Email">
      </div>

      <div class="mb-3">
         <label for="" class="form-label">TYPE USER</label>
         <select
            class="form-select form-select-lg"
            name="type_user"
            id=""
            style="border-radius: 0; border:2px solid;"
         >
            <option selected>Select one</option>
            <option value="customer">customer</option>
            <option value="admin">admin</option>
         </select>
      </div>
      

      <div class="mb-3">
      <label for="">PASSWORD</label>
      <input type="password" name="password" class="form-control" style="border-radius: 0; border:2px solid;"  required placeholder="Password">
 
      </div>

      <div class="mb-3">
      <label for="">CONFIRM PASSWORD</label>
      <input type="password" name="cpassword" class="form-control" style="border-radius: 0; border:2px solid;" required placeholder="Confirm  Password">
      </div>
      
      <div class="mb-3">
      <input type="submit" name="submit"  value="Register now" style="border-radius: 0; border:2px solid;"  class="form-control btn btn-outline-dark">
      </div>
      
      
      <p class="text-center">Already have an account? <a href="login_form.php">login now</a></p>
   </form>

</div>

</body>
</html>


