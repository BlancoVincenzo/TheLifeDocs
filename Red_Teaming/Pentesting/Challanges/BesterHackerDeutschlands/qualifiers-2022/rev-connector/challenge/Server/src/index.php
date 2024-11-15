<?php
if(!empty($_GET["debug"])){
	$debug = true;
} else {
	$debug = false;
}

if(!empty($_GET["ID"])){
	if($_GET["ID"] == "c56ac9e5a4faa7e8d694715ea6d1bff5"){
		if (!empty($_GET["key"])) {
			$key = $_GET["key"];
			$chars = str_split("ed5423f8cc0d0927273a57e4701c2c17");
			$position = 0;
			$correct = false;
			foreach($chars as $char){
				if($char == substr($key, $position, 1)){
					$correct = true;
				} else {
					if($debug == true){
						echo "Wrong char at position " . (string)$position;
					} else {
						echo "Wrong key!";
					}
					$correct = false;
					break;
				}	
				$position++;
			}
			if($correct == true){
				echo "DBH{cfa7e2d1-f588-47c0-adfc-7339ac29cbb1}";
			}
		} else {
			echo "No key submitted!";
		}
	} else {
		if($debug == true){
			echo "Incorrect ID!";
		}
	}
} else {
	if($debug == true){
		echo "Incorrect ID!";
	}
}
?>
