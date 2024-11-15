<?php
	setcookie("Session", "", time()+1500);
	header('Location: index.php');
?>