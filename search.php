 <?php
 include 'connect.php';
 $country=$_GET["country"];
 ?>
 <html>
 <head>
 <title>
     search engine
	 </title>
	 <style type="text/css">
	 #search-result 
	 {
		 font-size:22pt;
		 margin:5px;
		 padding:2px;
		 border-color:black;
	 }
	 #search-result:hover
	 {
		 border color:red;
	 }
	   #name{
		   color:#5cd65c
	   }
	   #name:hover{
		   text-decoration:underline;
	   }
	   
	 
	 </style>
	 
	 <body>
	 <form method="GET" action="search.php">
	    <table>
		<tr>
		 <td>
		 <img src="mi.jpg" class="img-fulid" alt="search">
		  </td>
		  </tr>
		  <tr>
		  <td>
		   <input type="text" value="<?php echo $country; ?>" name="country" style="width:450px"/>
		   <input type="submit" value="search"/>
		  </td>
		  </tr>
		  <tr>
		  <td>
		    <?php
			$stmt="SELECT * FROM web WHERE Name LIKE '%$country%' OR Address LIKE '%$country%'"; 
			$result=mysqli_query($conn,$stmt);
			$number_of_result=mysqli_num_rows($result);
			if($number_of_result<1) 
				
			{
				echo "no result found";
			}
			else
			{
				while($row=mysqli_fetch_assoc($result))
				{ 
					$name=$row["Name"];
					$add=$row["Address"];
					echo "<div id='search-result'>";
					echo "<a href='$add'>".$name ."</div>";		
					echo "</div>";
				}
			}
			?>
			</td>
		  </tr
		  </table>
		  </body>
		  </html>
		 