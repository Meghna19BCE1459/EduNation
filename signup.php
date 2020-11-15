<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign up form</title>
        <link rel="stylesheet" type="text/css" href="style2.css">
        <link rel='stylesheet' href=https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css>
</head>
        <body>
            <div class="form-box">
                <h1>Register here</h1>
                <form action="page2.php" method="post">
                <div class="input-box">
                <i class="fa fa-user-circle"></i>
                    <input type="text" id="name" name="name" placeholder="Enter your name">
                </div>
                <div class="input-box">
                    <i class="fa fa-envelope-o"></i>
                    <input type="email" id="emailid" name="emailid" placeholder="Enter your Email id">
                </div>
                <div class="errorMsg1">
                <?php if(!empty($_SESSION['errMsg1'])) { echo $_SESSION['errMsg1']; } ?>
</div>
                <div class="input-box">
                <i class="fa fa-phone"></i>
                    <input type="text" id="phone" name="phone" placeholder="Enter your mobile number">
                </div>
                <div class="input-box">
                <i class="fa fa-info-circle"></i>
                    <input type="number" id="age" name="age" placeholder="Enter your age">
                </div>
                <div class="input-box">
                    <i class="fa fa-key" ></i>
                    <input type="password" id="password" name="password" placeholder="Enter your Password">
                    <span class="eye" onclick="myFunction()">
                    <i id="hide1" class="fa fa-eye" ></i>
                    <i id="hide2" class="fa fa-eye-slash"></i>
                    </span>
                </div>
                <div class="input-box">
                <i class="fa fa-key" ></i>
                    <input type="password" id="confpass" name="confpass" placeholder="Confirm your Password">
                    <span class="eye" onclick="myFunction1()">
                    <i id="hide1" class="fa fa-eye" ></i>
                    <i id="hide2" class="fa fa-eye-slash"></i>
                    </span>
                </div>
                <button type="submit" class="login-btn" name="submit">Register</button>
                <button type="reset" class="login-btn" name="submit">Reset</button><br>
                <div class="Msg">
                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if(!empty($_SESSION['Msg'])) { echo $_SESSION['Msg']; } ?>
</div>
                <div class="errorMsg">
                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if(!empty($_SESSION['errMsg'])) { echo $_SESSION['errMsg']; } ?>
</div>
                </form>
            </div>
            <script>
            function myFunction()
            {
                var x=document.getElementById("password");
                var y=document.getElementById("hide1");
                var z=document.getElementById("hide2");

                if(x.type=== 'password'){
                    x.type="text";
                    y.style.display="block";
                    z.style.display="none";
                }
                else{
                    x.type="password";
                    y.style.display="none";
                    z.style.display="block";
                }
            }
            function myFunction1()
            {
                var x=document.getElementById("confpass");
                var y=document.getElementById("hide1");
                var z=document.getElementById("hide2");

                if(x.type=== 'password'){
                    x.type="text";
                    y.style.display="block";
                    z.style.display="none";
                }
                else{
                    x.type="password";
                    y.style.display="none";
                    z.style.display="block";
                }
            }
        </script>
        </body>
</html>
<?php unset($_SESSION['errMsg']); ?>
<?php unset($_SESSION['errMsg1']); ?>
<?php unset($_SESSION['Msg']); ?>
