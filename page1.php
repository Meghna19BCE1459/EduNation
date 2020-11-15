<?php
	$con=mysqli_connect("localhost","root","","education");

	if(isset($_POST['submit']))
	{
		$email = $_POST['email'];
		$pass = $_POST['password'];

		$sql="SELECT * FROM user WHERE Email='".$email."' AND Pswd='".$pass."'";
    	$query=mysqli_query($con,$sql);
    	$numrows=mysqli_num_rows($query);
    	if($numrows!=0)
    	{
    		while($row=mysqli_fetch_assoc($query))
    		{
    			$dbename=$row['Email'];
    			$dbpassword=$row['Pswd'];
    		}

    		if($email == $dbename && $pass == $dbpassword)
    		{
    			session_start();
    			$_SESSION['sess_user']=$email;

    			/* Redirect browser */
    			header("Location: newhome.html");  
    		}
    	}
    	else {
            session_start();
            $_SESSION['errMsg'] = "Invalid username or password";
    header("location: login.php");
        }
  }

?>
