<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Doctor</title>
		<link rel="stylesheet" type="text/css" href="listdoc2.css">
		<link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro&display=swap" rel="stylesheet">
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
		<h2>Information of the Doctor</h2>
		<div class="docdetail">
		<?php
		$licensenum = $_POST["licensenum"];
		$query = "SELECT * FROM doctor,hospital WHERE doctor.workoutof=hospital.code AND licensenum='" . $licensenum . "';";
		$result = mysqli_query($connection,$query);
		if (!$result) {
        die("databases query failed.");
		}
		$row = mysqli_fetch_assoc($result);
		echo "<p>Name: " . $row["firstname"] . " " . $row["lastname"] . "</p>";
		echo "<p>License Number: " . $row["licensenum"] . "</p>";
		echo "<p>Date be Licensed: " . $row["datebelicensed"] . "</p>";
		echo "<p>Specialty: " . $row["specialty"] . "</p>";
		echo "<p>Work At(Hospital): " . $row["name"] . "</p>";
		?>
		</div>
	</body>
	<?php
		mysqli_close($connection);
	?>
<br>
<button onclick="goBack()">BACK</button>
</html>