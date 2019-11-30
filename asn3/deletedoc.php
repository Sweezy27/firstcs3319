<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Doctor</title>
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
		<h3>List of patients treated by selected doctor:</h3>
		<?php
			$licensenum = $_POST["licensenum"];
			$query="SELECT patient.firstname,patient.lastname FROM doctor,treating,patient WHERE doctor.licensenum=treating.licensenum AND patient.ohip=treating.OHIP AND doctor.licensenum='" . $licensenum . "'";
			$result = mysqli_query($connection,$query);
			if (!$result) {
				die("databases query failed.");
			}
			echo "<ol>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<li>";
				echo $row["firstname"] . " " . $row["lastname"] . "<br>";
				echo "</li>";
			}
			echo "</ol>";
		?>
		<form action="deletedoc2.php" method="post">
			<lable>Still want to delete?</lable>
			<button type="submit" name="licensenum" value=<?php echo '"'.$_POST["licensenum"].'"'; ?>>YES</button>
		</form>
		<?php
            mysqli_close($connection);
        ?>
	</body>
<br>
<button onclick="goBack()">BACK</button>
</html>