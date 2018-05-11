<?php 
	session_start(); // login page create kora session ta start korte hobe
	
 ?>


<!DOCTYPE html>
<html>
<head>

	<title>Home Page</title>

	<link rel="stylesheet" type="text/css"  href="style1.css" />

</head>
<body>
  
    
	 <div id ="main-wrapper" > 
      <center> 

	  <h1> Home page </h1> 
	    <h3>
	     welcome...

		 <?php 
		 echo $_SESSION['username'] 		//showing the name of the user in the homepage through session.
		 
		 
		 ?> 

	    </h3> 
	</center>
			<center> <img src = 'images/avatar.jpg' class= "avatar"> </center>

			<form class = "myform" action = "" method ="post"> 
		<input name = "logout" type = "submit" id = "logout-btn" value = "Logout"> <br> <br>
			
			
			</form>

			<?php 
			
				if(isset($_POST['logout'])){
					session_destroy();
					header('location:login.php');
				}
			
			?>
			
	 </div>
</body>
</html>