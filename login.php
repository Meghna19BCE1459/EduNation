<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login page</title>
        <link rel="stylesheet" type="text/css" href="style1.css">
        <link rel='stylesheet' href=https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css>
    </head>
    <body>
        <div class="form-box">
            <h1>Log In Here</h1>
            <form action="page1.php" method="post">
                <div class="input-box">
                    <i class="fa fa-envelope-o"></i>
                    <input type="email" id="email" name="email" placeholder="Email id">
                </div>  
                <div class="input-box">
                    <i class="fa fa-key" ></i>
                    <input type="password" id="password" name="password" placeholder="Password">
                    <span class="eye" onclick="myFunction()">
                    <i id="hide1" class="fa fa-eye" ></i>
                    <i id="hide2" class="fa fa-eye-slash"></i>
                    </span>
                </div>
                <button type="submit" class="login-btn" name="submit">Sign In</button><br>
                
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Don't have an account?&nbsp;&nbsp;<a href="signup.php">Sign Up</a>
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
        </script>
    </body>
</html>
<?php unset($_SESSION['errMsg']); ?>
