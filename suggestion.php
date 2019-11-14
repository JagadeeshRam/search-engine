 <?php
 include 'connect.php';
 $query=$_GET["query"];
 
			$stmt="SELECT * FROM web WHERE name LIKE '%$query%' OR link LIKE '%$query%' OR des LIKE '%$query%'"; 
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
					echo "<div id='sugg- search-result'>";
					echo "<a href='$add' id='sugg-name'>".$name ."</a>"; 
					echo "</div>";
				}
			}
			?>
			