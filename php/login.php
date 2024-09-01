<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/login.css">
</head>

<body class="bodysignin">
    <div class="allsidesforloginpage">
        <div class="pictureLefSide">
            <img src="../icon/تصميم بدون عنوان2.png" class="picturebetweenform ">

        </div>
        <div class=" loginformrightSide">
            <center>
                <h2 class="loginPageText">Login Page</h2>
                <br>
                <form action="login.php" method="post">
                    <?php include('errors.php'); ?>
                    <input type="text" name="username" id="uname" class="usernametextfield" placeholder="   username" required>
                    <br>
                    <br>
                    <input type="password" name="password" id="pass" class="passwordtextfield" placeholder="   password" required>
                    <br>
                    <br>
                    <button class="loginbuttonOnloginform" type="submit" name="loginbutton">Login</button>
                    <br>
                    <div class="gotosignuppagediv">
                        <p class="Donothaveaccounttext">Do not have account?</p>
                        <a href="signup.php" class="signuppagelink">signup</a>
                    </div>
                </form>
            </center>
        </div>
    </div>


</body>

</html>