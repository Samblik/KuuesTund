<?php

	require_once("../konfig_global.php");
	$database = "if13_rene_p";
	
	function getCarData(){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("SELECT id, user_id, number_plate, color FROM car_plates WHERE deleted IS NULL");
		$stmt->bind_result($id_from_db, $user_id_from_db, $number_plate_from_db, $color_from_db);
		$stmt->execute();
		
		$array = array();
		
		
		while($stmt->fetch()){
		
		//loon objekti
		$car = new StdClass();
		$car->id = $id_from_db;
		$car->number_plate = $number_plate_from_db;
		$car->color = $color_from_db;
		$car->user_id = $user_id_from_db;
		
		array_push($array, $car);
		//echo "<pre>";
		//var_dump($array);
		//echo "</pre>";
		
			
		}
		
		$stmt->close();
		$mysqli->close();
		
		return $array;
	}
	
	
	
	function deleteCar($id_to_be_deleted){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("UPDATE car_plates SET deleted=NOW() WHERE id=?");
		$stmt->bind_param("i", $id_to_be_deleted);
		
		if($stmt->execute()){
			// sai edukalt kustutatud
			header("Location: table.php");
			
		}
		
		$stmt->close();
		$mysqli->close();
		
	}
	

?>


