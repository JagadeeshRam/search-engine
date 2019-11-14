<?php
 $conn=mysqli_connect("localhost","root","","searchengine");
 if(!$conn)
 {
	 echo "can nt connect to database";
	 die();
 }
 mysqli_select_db($conn,"searchengine");

 ?>
 