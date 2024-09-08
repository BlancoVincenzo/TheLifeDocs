<?php
if (!empty($_POST["username"]) and !empty($_POST["password"])) {
    $username = $_POST["username"];
	$password = $_POST["password"];
	
	if ($username == "admin" and $password == "sdflkjsdflsfdlkjlkdsfj"){
		setcookie("Session", "8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918", time()+1500);
		header("Refresh:0");
	} else {	
		if ($username == "user" and $password == "f45mSC4B5yZRzpoTE9"){
			setcookie("Session", "04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb", time()+1500);
			header("Refresh:0");
		} else {
			setcookie("Session", "", time()+1500);
			header("Refresh:0");
		}
	}
	
} 
?>
<html>
<head>
<style>
    body {
		
        .centerImage
			{
			 text-align:center;
			 display:block;
			}
    }
/* Basics */
html, body {
    width: 100%;
    height: 100%;
	background-color:#000000;
    font-family: "Helvetica Neue", Helvetica, sans-serif;
    color: #444;
    -webkit-font-smoothing: antialiased;
	.centerImage
	{
		text-align:center;
		display:block;
	}
}
#container {
    position: fixed;
    width: 340px;
    height: 280px;
    top: 50%;
    left: 50%;
    margin-top: -140px;
    margin-left: -170px;
	background: #fff;
    border-radius: 3px;
    border: 1px solid #ccc;
    box-shadow: 0 1px 2px rgba(0, 0, 0, .1);
	
}
form {
    margin: 0 auto;
    margin-top: 20px;
}
label {
    color: #555;
    display: inline-block;
    margin-left: 18px;
    padding-top: 10px;
    font-size: 14px;
}
p a {
    font-size: 11px;
    color: #aaa;
    float: right;
    margin-top: -13px;
    margin-right: 20px;
 -webkit-transition: all .4s ease;
    -moz-transition: all .4s ease;
    transition: all .4s ease;
}
p a:hover {
    color: #555;
}
input {
    font-family: "Helvetica Neue", Helvetica, sans-serif;
    font-size: 12px;
    outline: none;
}
input[type=text],
input[type=password] {
    color: #777;
    padding-left: 10px;
    margin: 10px;
    margin-top: 12px;
    margin-left: 18px;
    width: 290px;
    height: 35px;
	border: 1px solid #c7d0d2;
    border-radius: 2px;
    box-shadow: inset 0 1.5px 3px rgba(190, 190, 190, .4), 0 0 0 5px #f5f7f8;
-webkit-transition: all .4s ease;
    -moz-transition: all .4s ease;
    transition: all .4s ease;
	}
input[type=text]:hover,
input[type=password]:hover {
    border: 1px solid #b6bfc0;
    box-shadow: inset 0 1.5px 3px rgba(190, 190, 190, .7), 0 0 0 5px #f5f7f8;
}
input[type=text]:focus,
input[type=password]:focus {
    border: 1px solid #a8c9e4;
    box-shadow: inset 0 1.5px 3px rgba(190, 190, 190, .4), 0 0 0 5px #e6f2f9;
}
#lower {
    background: #ecf2f5;
    width: 100%;
    height: 69px;
    margin-top: 20px;
	  box-shadow: inset 0 1px 1px #fff;
    border-top: 1px solid #ccc;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
}
input[type=checkbox] {
    margin-left: 20px;
    margin-top: 30px;
}
.check {
    margin-left: 3px;
	font-size: 11px;
    color: #444;
    text-shadow: 0 1px 0 #fff;
}
input[type=submit] {
    float: right;
    margin-right: 20px;
    margin-top: 20px;
    width: 80px;
    height: 30px;
font-size: 14px;
    font-weight: bold;
    color: #fff;
    background-color: #acd6ef; /*IE fallback*/
    background-image: -webkit-gradient(linear, left top, left bottom, from(#acd6ef), to(#6ec2e8));
    background-image: -moz-linear-gradient(top left 90deg, #acd6ef 0%, #6ec2e8 100%);
    background-image: linear-gradient(top left 90deg, #acd6ef 0%, #6ec2e8 100%);
    border-radius: 30px;
    border: 1px solid #66add6;
    box-shadow: 0 1px 2px rgba(0, 0, 0, .3), inset 0 1px 0 rgba(255, 255, 255, .5);
    cursor: pointer;
}
input[type=submit]:hover {
    background-image: -webkit-gradient(linear, left top, left bottom, from(#b6e2ff), to(#6ec2e8));
    background-image: -moz-linear-gradient(top left 90deg, #b6e2ff 0%, #6ec2e8 100%);
    background-image: linear-gradient(top left 90deg, #b6e2ff 0%, #6ec2e8 100%);
}
input[type=submit]:active {
    background-image: -webkit-gradient(linear, left top, left bottom, from(#6ec2e8), to(#b6e2ff));
    background-image: -moz-linear-gradient(top left 90deg, #6ec2e8 0%, #b6e2ff 100%);
    background-image: linear-gradient(top left 90deg, #6ec2e8 0%, #b6e2ff 100%);
}
</style>
<?php
	
	
if (!empty($_COOKIE["Session"])){
	$cookie = $_COOKIE["Session"];
	
	if ($cookie == "8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918"){
		echo '
		</head>
		<body>
		<div id="container">
			<form action="logout.php" method="post">
			<label>Willkommen Admin!</label></br>
			<label>DBH{e4c67197-68d0-4554-9771-245c68d9be49}</label></br>
					<input type="submit" value="Logout">
			</form>
		</div>
		<img src="DBH_Logo_2022_new.png" class="centerImage">
		</body>
		</html>';		
	} else {
		if ($cookie == "04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb"){
			echo '
			</head>
			<body>
			<div id="container">
				<form action="logout.php" method="post">
				<label>Willkommen User!</label></br>
				<input type="submit" value="Logout">
				</form>
			</div>
			<img src="DBH_Logo_2022_new.png" class="centerImage">
			</body>
			</html>';
		} else {
			echo '
			</head>
			<body>
				<div id="container">
					<form action="index.php" method="post">
						<label for="username">Username:</label>
						<input type="text" id="username" name="username">
						<label for="password">Password:</label>
						<input type="password" id="password" name="password">
						<div id="lower">
							<input type="submit" value="Login">
						</div>
					</form>
				</div>
			<img src="DBH_Logo_2022_new.png" class="centerImage">
			</body>
			</html>';			
		}
	}

} else {
	echo '</head>
<body>
	<div id="container">
		<form action="index.php" method="post">
			<label for="username">Username:</label>
			<input type="text" id="username" name="username">
			<label for="password">Password:</label>
			<input type="password" id="password" name="password">
			<div id="lower">
				<input type="submit" value="Login">
			</div>
		</form>
	</div>
<img src="DBH_Logo_2022_new.png" class="centerImage">
</body>
</html>';
}
?>