<?php
	
	// table.php
	require_once("functions.php");
	
	if(isset($_GET["delete"])){
		//saadan kaasa id mida kustutada
		
		deleteCar($_GET["delete"]);
		
	}
	
	$car_list = getCarData();
?>

<table border=1 >
	<tr>
		<th>ID</th>
		<th>Auto nr</th>
		<th>V2rv</th>
		<th>User ID</th>
		
	</tr>
	
	<?php
	
		for($i = 0; $i < count($car_list); $i++){
			echo "<tr>";
			
			echo "<td>".$car_list[$i]->id."</td>";
			echo "<td>".$car_list[$i]->number_plate."</td>";
			echo "<td>".$car_list[$i]->color."</td>";
			echo "<td>".$car_list[$i]->user_id."</td>";
			
			echo "<td><a href='?delete=".$car_list[$i]->id."'>X</a></td>";
			
			
			echo "</tr>";
			
		}
	
	
?>
</table>

