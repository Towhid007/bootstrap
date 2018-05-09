<?php  
session_start();					//niche creare kora session ta start kora lagbe ekhane
 require 'dbconfig/config.php';  	 //eshteblishing a connection from database through config.php;
?>




<!DOCTYPE html>
<html>
<head>

	<title>Login Page</title>

	<link rel="stylesheet" type="text/css"  href="style.css" />

</head>
<body>
	 <div id ="main-wrapper" > 
      <center> <h1> Login Form </h1> </center>
			<center> <img src = 'images/avatar.jpg' class= "avatar"> </center>

			<form class = "myform" action = "index.php" method ="post"> 
			<label> Username: </label> <br>
			<input name ="username" type = "text" class = "inputvalues" placeholder = "Enter Username" required> <br> <br>

			<label> Password: </label> <br>
			<input name = "password" type = "password" class = "inputvalues" placeholder = "Enter Password" required> <br> <br>

			<input name = "login"  type = "submit" id = "login-btn" value = "Login"> <br> <br>
		<a href = "register.php">	<input type = "button" id = "register-btn" value ="register" > </a>
			
			</form>



			<?php 
			
				if(isset($_POST['login'])){
					$username = $_POST['username'];
					$password = $_POST['password'];
					$query = "SELECT * FROM userinfotable WHERE username = '$username' AND password='$password' ";
					$query_run = mysqli_query($con,$query);

					if(mysqli_num_rows($query_run)>0){                   //this is valid user and pass
						
						$_SESSION['username'] = $username;
							header('location: homepage.php');
																		//storing the username in a session variable
																		//coz we have to access it in the next home page
																		//session is a global variable
																		//lasts throwout the session of the browser
					}
					else{
						echo '<script type ="text/javascript" > alert("invalid username/password!!") </script>';
					}
					
				
					
				}
			
			?>
			
	 </div>
</body>
</html>