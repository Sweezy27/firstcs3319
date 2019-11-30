<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Patient</title>
    </head>
    <script>
	function goBack() {
	  window.history.back()
	}
	</script>	

	<body>
		<?php
            include 'connectdb.php';
        ?>
		<h2>Information of the patient:</h2>
		<?php
			$ohip = $_POST["ohip"];
			$query = "SELECT patient.firstname AS f1,patient.lastname AS l1,doctor.firstname AS f2,doctor.lastname AS l2, patient.ohip  FROM doctor,treating,patient WHERE doctor.licensenum=treating.licensenum AND patient.ohip=treating.OHIP AND patient.ohip='" . $ohip . "';";
			$result = mysqli_query($connection,$query);
			if (!$result) {
				die("The OHIP does not exist.");
			}
			$row = mysqli_fetch_assoc($result);
			if($row["ohip"] == NULL){
				echo "Error: The OHIP does not exist.";
			}
			else{
				echo "OHIP: " . $row["ohip"] . "<br>";
				echo "Patient's name: " . $row["f1"] . " " . $row["l1"] . "<br>";
				echo "Treating by doctor:" . "<ol>";
				do{
					echo "<li>" . $row["f2"] . " " . $row["l2"] . "</li>";
				}while($row = mysqli_fetch_assoc($result));
				echo "</ol>";	
			}
			mysqli_free_result($result);
		?>
	<?php
		mysqli_close($connection);
	?>
	</body>
	<br>
	<br>
	<button onclick="goBack()">BACK</button>
</html>