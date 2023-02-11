<?php

if(!isset($_SESSION)){
	session_start();
}

if(isset($_SESSION['UserLogin'])){
	echo "<div class='message success'>Welcome " .$_SESSION['UserLogin'].'</div>';
}else{
	echo "<div class='message info'>Welcome Guest</div>";
}


include_once("connections/connection.php");

$con = connection();

$sql = "SELECT * FROM student_list ORDER BY id DESC";
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Management System</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>

</head>
<body>
	<div class="wrapper">

	<h1>Student Management System</h1>
	<br>
	<br>

	 <div class="search-container">
		<form action="result.php" method="get">
			<input type="text" name="search-input" class="search-input" required>
				<button type="submit" name="search-button" class="search-button">Search</button>
		</form>
	 </div>
		
	<div class="button-container">
	  <?php if(isset($_SESSION['UserLogin'])){?>
	    <a href="logout.php">Logout</a>
	  <?php } else { ?>
	    <a href="login.php">Login</a>
	  <?php } ?> 
	  <a href="add.php">Add New</a>
	</div>

	<table>
 
		<thead>
		<tr> 
			<th>Details</th>
			<th>First Name</th>
			<th>Last Name</th>
		</tr> 
		</thead> 

		<tbody>
		<?php do{ ?>
		<tr>
			<td width ="30 " ><a href="details.php?ID=<?php echo $row['id'];?>"
			 class = "button-small">view</td>
			<td><?php echo $row['first_name']; ?></td>
			<td><?php echo $row['last_name']; ?></td>
		</tr>
		<?php }while($row = $students->fetch_assoc()) ?>
		</tbody>

	</table>
	</div>  
</body>
</html>