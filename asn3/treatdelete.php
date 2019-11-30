<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Treating</title>
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
		<h2>Stop a treating:</h2>
		<h3>List of patients are treating by selected doctor:</h3>
		<?php
			$licensenum = $_POST["licensenum"];
			$query = "SELECT patient.firstname,patient.lastname,patient.ohip FROM doctor,treating,patient WHERE doctor.licensenum=treating.licensenum AND patient.ohip=treating.OHIP AND doctor.licensenum='" . $licensenum . "';";
			$result = mysqli_query($connection,$query);
			if (!$result) {
				die("Error: query failed.");
			}
			echo "<ol>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<li>";
				echo $row["firstname"] . " " . $row["lastname"] . " " . $row["ohip"] . "<br>";
				echo "</li>";
			}
			mysqli_free_result($result);
			echo "</ol>";
		?>
		<form action="treatdelete2.php" method="post">
			<lable>Pick one want to delete(OHIP):</lable>
			<input type="text" name="ohip">
			<input type="hidden" name="licensenum" value=<?php echo '"' . $_POST["licensenum"] . '"'; ?>>
			<input type="submit" value="STOP">
		</form>
				
		<?php
            mysqli_close($connection);
        ?>
	</body>
	<br>
	<button onclick="goBack()">BACK</button>
</html>