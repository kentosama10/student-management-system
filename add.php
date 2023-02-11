<?php

include_once("connections/connection.php");
$con = connection();

if(isset($_POST['submit'])){

	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$gender = $_POST['gender'];

	 $sql = "INSERT INTO `student_list`( `first_name`, `last_name`, `gender`) VALUES ('$fname','$lname','$gender')";

	 $con->query($sql) or die ($con->error);
 	
 	echo header ("Location: index.php"); 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Management System</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="form-container">
		<form action="" method="post">

			<label>First Name</label>
			<input type="text" name="firstname" id="firstname" required placeholder="Enter First Name">

			<label>Last Name</label>
			<input type="text" name="lastname" id="lastname" required placeholder="Enter Last Name">

			<label>Gender</label>
			<select name="gender" id="gender" required>
				<option value="">--Select Gender--</option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
			</select>
			<input type="submit" name="submit" value="Submit Form">

			<a href="index.php">Back</a>
		</form>
	</div>
</body>
</html>