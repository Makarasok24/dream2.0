<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/04762201f9.js" crossorigin="anonymous"></script>
    <title>Thank You</title>
    <style>
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
        @font-face {
            font-family: TeXGyreAdventor;
            src: url(Font/texgyreadventor-bold.otf);
        }

        *{
            font-family:TeXGyreAdventor ;margin:0; padding:0;

        }
        body{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        .container{
            width: 100%;
            height: 100vh;
            display: flex;
            /*background: #ffffff;*/
            align-items: center;
            justify-content: center;
        }
        .popup{
            width: 400px;
            background-color: #fff;
            border-radius: .5rem;
            position: absolute;

            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            padding: 0 30px 30px;
            color: #333;
        }
        .popup span i{
            color: #000000;
            font-size: 70px;
            border-radius: 50%;
            margin-top: -100px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);

        }
        .popup h2{
            font-size: 30px;
            font-weight: 500;
            margin: 30px 20px;
        }
        .popup button{
            width: 100%;
            margin-top: 30px;
            padding: 10px 0;
            outline: none;
            border: 0;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            background-color: #000000;
            color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: 0.5s;
        }
        button:hover{
            opacity: 0.7;
        }
        .dance{
            position: absolute;
            margin-top: 280px;
            margin-left: 180px;
            border-radius: 20px;
            height: 100px;
        }
        .dancee {
            position: absolute;
            margin-top: 280px;
            margin-left: 1270px;
            border-radius: 20px;
        }
    </style>
</head>
<body>
<div class="dance">
    <img src="https://i.pinimg.com/originals/75/24/6a/75246a0fa008e53f89ff01dd6849659f.gif" height="500px">
</div>
<div class="dancee">
    <img src="https://i.pinimg.com/originals/de/3e/8d/de3e8d668a77267503d4d77bb1ab8642.gif" height="500px">
</div>









    <div class="container">
            <div class="popup">
                <span><i class="fa-solid fa-circle-check"></i></span>
                <h2>Thank you for shopping!</h2>
                <p>Your order has been Send, Please wait for confirm your order from admin, Thank you!</p>
                <a href="Homepage.php"><button>OK</button></a>
            </div>
    </div>
</body>
</html>