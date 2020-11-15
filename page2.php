<?php

if(isset($_POST["submit"]))
{
    if(!empty($_POST['name']) && !empty($_POST['emailid']) && !empty($_POST['phone'])&& !empty($_POST['password']) && !empty($_POST['confpass']) && !empty($_POST['age']))
        {
            $name=$_POST['name'];
            $emailid=$_POST['emailid'];
            $phone=$_POST['phone'];
            $age=$_POST['age'];
            $password=$_POST['password'];
            $confpass=$_POST['confpass'];

            if ($password != $confpass)
            {
                echo("Error... Passwords do not match");
                exit;
            }
            $con=@mysqli_connect('localhost','root','','education') /*or die(mysql_error())*/;

            $sql="SELECT * FROM user WHERE Email='".$emailid."'";
            $query=mysqli_query($con,$sql);
            $numrows=mysqli_num_rows($query);
                $sql="INSERT INTO user VALUES('$name','$password','$emailid','$phone','$age');";


                $result=mysqli_multi_query($con,$sql);
                if($result)
                {
                    session_start();
                    $_SESSION['Msg'] = "Account successfully created..Please login";
            header("location: login.php");
                }
                else
                {
                    session_start();
                    $_SESSION['errMsg1'] = "Email already exists!";
            header("location: signup.php");
                }
        }
        else
        {
            session_start();
            $_SESSION['errMsg'] = "All fields are required";
    header("location: signup.php");
        }
    }
?>
