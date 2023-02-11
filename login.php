<?php


if(!isset($_SESSION)){
	session_start();
}

include_once("connections/connection.php");
$con = connection();

if(isset($_POST['login'])){

	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM student_users WHERE username = '$username' AND password = '$password'";


	$user = $con->query($sql) or die ($con->error);
	$row = $user->fetch_assoc();
	$total = $user->num_rows;


	if($total > 0){
		$_SESSION['UserLogin'] = $row['username'];
		$_SESSION['Access'] = $row['access'];

		echo header ("Location: index.php");
	}else{
		echo "<div class='message warning'>No user found.</div>";
	}
 
	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Student Management System</title>

</head> 
<body id = "form-login">

	<div class="login-container">
	<h2>Saint Vincent's College Incorporated</h2>

	
	</br>

	<div class="form-logo">
		<image src=img/svci_logo.jpg alt="">
	</div>

	<form action="" method="post">

			<div class="form-element">
		<label>Username</label>
				<input type="text" name="username" id ="username" autocomplete="off" placeholder="Enter Username" required>
			</div>

			<div class="form-element">
		<label>Password</label>
				<input type="password" name="password" id ="password" placeholder="Enter Password" required>
			</div>

		<button type="submit" name="login" id="login">Login</button>

	</form>
	</div>
</body>
</html>