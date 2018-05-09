<?php
$con = mysqli_connect("localhost", "root", "") or die("Unable to connect");
mysqli_select_db($con,'samplelogindb');

/*
esteblishing a connection through 'samplelogindb' table, (jeta phpmyadmin a create kora hoise) 

(parameters):
1.  'localhost' for accessing any domain or server.
2.  'root' is used as admin directly accessing the server.
3.   blank "" quotation means, there is no password for admin.

*/






?>