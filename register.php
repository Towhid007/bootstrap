<?php
    require 'dbconfig/config.php';

    /* 
    dbconfig folder a connection ta create kora ase. so..
    'require' keyword diye connection ta ekhane include korlam.
    so ekhane o connection ta eshteblish hoye gelo.
    */
?>


<!DOCTYPE html>
<html>
<head>

	<title>Registration Page</title>

	<link rel="stylesheet" type="text/css"  href="style.css" />

</head>
<body>
	 <div id ="main-wrapper" > 
      <center> <h1> Registration Form </h1> </center>
			<center> <img src = 'images/avatar.jpg' class= "avatar"> </center>

			<form class = "myform" action = "register.php" method ="post"> 



            <label> Full Name:</label> <br>
            <input name ="fullname" type = "text" class = "inputvalues" placeholder="Enter your Full Name" required> <br> <br>
            

			<label> Username: </label> <br>
			<input name = "username" type = "text" class = "inputvalues" placeholder = "Enter Username" required> <br> <br>
			<label> Password: </label> <br>
            <input name = "password" type = "password" class = "inputvalues" placeholder = "Enter Your Password"required> <br> <br>
            <label> Confirm Password: </label> <br>
			<input name="cpassword" type = "password" class = "inputvalues" placeholder = "Confirm Password"required> <br> <br>
            <label>Gender: </label>
            <input  type ="radio" class = "radio-btn" name ="gender" value="male" required> Male 
            <input  type ="radio" class = "radio-btn" name ="gender" value="female" required>Female  <br> <br>
            <label>Qualification: </label>

            <select name = "qualification" class ="qualification"> 
                <option value="BScIT" > BScIT </option>
                <option value="BMS" >BMS </option>
                <option value="BE.IT" > BE.IT </option>
                <option value="MCA" > MCA </option>
             </select> <br> <br>
			<input name = "submit-btn" type = "submit" id = "signup-btn" value = "sign Up"> <br> <br>
           <a href = "index.php"> <input type = "button" id = "back-btn" value ="back" > </a>
            
			
            </form>
            


            <?php
             if(isset($_POST['submit-btn']))  //it means that ,submit button clicked or not??
               {

                $fullname = $_POST['fullname'];
                $gender = $_POST['gender'];
                $qualification = $_POST['qualification'];


                  //  echo '<script type ="text/javascript" > alert("sign up button clicked") </script>';
                  $username = $_POST['username'];
                  $password = $_POST['password'];  
                  $cpassword = $_POST['cpassword'];
                  //name attribute gula ekta variable er moddhe rakhlam, matching check korar jonno.

                  
                  if($password == $cpassword)  //dhorlam password r confirm password thik ache but same username type korse.
                  {
                    $query = "SELECT * FROM userinfotable WHERE username = '$username' ";
                    $query_run = mysqli_query($con, $query);  //$con ta database a ki ki ase ta access korar jonne lage 
                                                              //eta config.php te create kora ase.

                    /*   
                        1. database er 'user' namok table e,  'username' collumn tar shathe user input er
                         '$username' ta compare korlam (karon match hoilei error show korbe)
                        2. 'query_run' varriable er moddhe joma rakhlam
                    */


                if(mysqli_num_rows($query_run) > 0) //jodi same username er row 1 barer beshi ashe tahole error.
                    {
                        //there is already an username
                        echo '<script type ="text/javascript" > alert("already an username!!!") </script>';

                    } 

                else
                    {
                    $query = "INSERT INTO userinfotable VALUES('','$username', '$fullname', '$gender','$qualification', '$password') ";
                                                                        //here first parameter is null..
                                                                        //(because first parameter is id which will auto increment).
                                                                        //here the order of the values are according to the table collumns
                    $query_run = mysqli_query($con, $query); 
                        //otherwise database a data insert korlam
                    if($query_run)
                    {
                            echo '<script type ="text/javascript" > alert("Registration Successful..Go to login page") </script>';
                    }
                    else{
                            echo '<script type ="text/javascript" > alert("Error!") </script>';
                        }
                    }
 

                  }
                  else{
                    echo '<script type ="text/javascript" > alert("password and confirm password doesnot matched!") </script>';
                  }
                  
               }
            
            ?>


			
	 </div>
</body>
</html>