
<?php
    global $con;
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
    .container{
        background-color: white;
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

    .login_back{
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

</style>
<div class="login_back d-flex" >
    <div class="log2" style="width:40%; margin-top:10%; height: 20%">
            <h2 style="margin-top: -5px; text-align: center">LOGIN</h2>
        <form action="login_action.php" method="post" role="form">
            <div class="mb-3">
                <label for="" class="form-label">Uesername</label>
                <input
                    type="text"
                    class="form-control"
                    name="username"
                    id=""
                    aria-describedby="emailHelpId"
                    placeholder="Username"
                    style="border-radius: 0;border:2px solid;"
                />
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input
                    type="password"
                    class="form-control"
                    name="password"
                    id=""
                    aria-describedby="emailHelpId"
                    placeholder="Password"
                    style="border-radius: 0;border:2px solid;"
                />
            </div>

            <input type="submit" name="login_btn" class="form-control btn" style="border-radius: 0;border:2px solid;" value="LOGIN">
            
            <p class="text-center mt-3">Do not have an account? <a href="register.php">Create New</a></p>
        </form>
    </div>
</div>

