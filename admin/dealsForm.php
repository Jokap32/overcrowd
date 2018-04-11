<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<script>
		function resetForm(){
			document.getElementById("dealsForm").reset();
		}
	</script>


	<td>
		<h2>Please Input Your Deals For Current Week</h2>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?page=dealsForm";?>" name="dealsForm" id="dealsForm">
			<fieldset style="border:0";>

				<label>Monday:</label><br>
				<textarea rows="2" cols="20" required name="Monday"></textarea>

				<br><br>

				<label>Tuesday:</label><br>
				<textarea rows="2" cols="20" required name="Tuesday"></textarea>

				<br><br>

				<label>Wednesday:</label><br>
				<textarea rows="2" cols="20" required name="Wednesday"></textarea>

				<br><br>

				<label>Thursday:</label><br>
				<textarea rows="2" cols="20" required name="Thursday"></textarea>

				<br><br>

				<label>Friday:</label><br>
				<textarea rows="2" cols="20" required name="Friday"></textarea>

				<br><br>

				<label>Saturday:</label><br>
				<textarea rows="2" cols="20" required name="Saturday"></textarea>

				<br><br>

				<label>Sunday:</label><br>
				<textarea rows="2" cols="20" required name="Sunday"></textarea>

				<br><br>

				<input type="submit" name="submit" value="Submit">
			</fieldset>
		</form>


<?php

if($_SERVER['REQUEST_METHOD'] =="POST")
{
	$Monday = $_POST['Monday'];
	$Tuesday = $_POST['Tuesday'];
	$Wednesday = $_POST['Wednesday'];
	$Thursday = $_POST['Thursday'];
	$Friday = $_POST['Friday'];
	$Saturday = $_POST['Saturday'];
	$Sunday = $_POST['Sunday'];
}

	$servername ="localhost";
	$username = "root";
	$password = "mysql";
	$databaseName = "overcrowd";

	$connection = new mysqli($servername, $username, $password, $databaseName);

	if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
	}


	$insertSQL = "INSERT INTO Deals (Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday) VALUES ('$Monday', '$Tuesday', '$Wednesday', '$Thursday', '$Friday', '$Saturday', '$Sunday')";

	if ($connection->query($insertSQL) === TRUE){
		echo "Success!";
	}

	else{
		echo "Error!";
	}

	$connection->close();



?>
	
</body>
</html>

