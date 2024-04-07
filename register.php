<?php
include "connection.php";
include "menu.php";
?>
<style>
    @font-face {
        font-family: TeXGyreAdventor;
        src: url(Font/texgyreadventor-bold.otf);
    }

    *{
        font-family:TeXGyreAdventor ;margin:0; padding:0;
        box-sizing: border-box;
        outline: none; border:none;
        text-decoration: none;
    }
    body {
        margin: auto;
        /*font-family: -apple-system, BlinkMacSystemFont, sans-serif;*/
        overflow: auto;
        background: linear-gradient(315deg, rgb(241, 217, 217) 3%, rgb(223, 237, 201) 38%, rgb(205, 197, 227) 68%, rgb(169, 208, 246) 98%);
        animation: gradient 15s ease infinite;
        background-size: 400% 400%;
        background-attachment: fixed;
    }

    @keyframes gradient {
        0% {
            background-position: 0% 0%;
        }
        50% {
            background-position: 100% 100%;
        }
        100% {
            background-position: 0% 0%;
        }
    }

    .wave {
        background: rgb(255 255 255 / 25%);
        border-radius: 1000% 1000% 0 0;
        position: fixed;
        width: 200%;
        height: 12em;
        animation: wave 10s -3s linear infinite;
        transform: translate3d(0, 0, 0);
        opacity: 0.8;
        bottom: 0;
        left: 0;
        z-index: -1;
    }

    .wave:nth-of-type(2) {
        bottom: -1.25em;
        animation: wave 18s linear reverse infinite;
        opacity: 0.8;
    }

    .wave:nth-of-type(3) {
        bottom: -2.5em;
        animation: wave 20s -1s reverse infinite;
        opacity: 0.9;
    }

    @keyframes wave {
        2% {
            transform: translateX(2px);
        }

        25% {
            transform: translateX(-25%);
        }

        50% {
            transform: translateX(-50%);
        }

        75% {
            transform: translateX(-25%);
        }

        100% {
            transform: translateX(2px);
        }
    }


    .animate__animated.animate__fadeInUp {
        --animate-duration: 2s;
    }
    .login_back1{
        width: 1200px;
        border-radius: 20px;
        margin-top: 100px;
    }
    .log2{
        background-color: white;
        padding: 20px;
        margin-left: 680px;
        border-radius: 20px;

    }
    .container{
        background-color: white;
        border-radius: 20px;
        padding: 20px;
        position: absolute;
        margin-left: 32%;


    }
</style>

<div class="container " style="width: 35%; margin-top: 120px">
    <h2 style="margin-top: -5px; text-align: center">REGISTER</h2>
   <form action="register_action.php" method="post">
    
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
      <input type="text" name="username" class="form-control" style="border-radius: 0; border:2px solid;" required placeholder="Username">
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
      
      
      <p class="text-center">Already have an account? <a href="login.php">Login now</a></p>
   </form>

</div>

</body>
</html>


