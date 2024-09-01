<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/signup.css">
</head>

<body class="bodysignup">
    <div class="allsidesforloginpage">
        <div class="pictureLefSide">
            <img src="../icon/تصميم بدون عنوان2.png" class="picturebetweenform" alt="">
        </div>
        <div class=" loginformrightSide">
            <center>
                <h2 class="signupPageText">Signup Page</h2>
                <br>
                <form action="signup.php" method="post">
                    <?php include('errors.php'); ?>
                    <input type="text" name="username" id="username" class="usernametextfield" placeholder="   username" required value="<?php echo $username; ?>">
                    <br>
                    <br>
                    <input type="email" name="email" id="email" class="emailtextfield" placeholder="   email" required value="<?php echo $email; ?>">
                    <br>
                    <br>
                    <input type="password" name="password" id="password" class="passwordtextfield" placeholder="   password" required>
                    <br>
                    <br>
                    <input type="text" name="mobile" id="mobile" class="mobilenumbertextfield" placeholder="   mobile" required value="<?php echo $mobile; ?>">
                    <br>
                    <br>
                    <button class=" signupbuttonOnloginform" type="submit" name="signupbutton">Signup</button>
                    <br>
                    <div class="gotosigninpagediv">
                        <p class="haveaccounttext">Have account?</p>
                        <a href="login.php" class="loginpagelink">Login</a>
                    </div>
                </form>
            </center>
        </div>
    </div>


</body>

</html>