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
		<?php
			$firstname = $_POST["firstname"];
			$lastname = $_POST["lastname"];
			$licensenum = $_POST["license"];
			$date = $_POST["date"];
			$specialty = $_POST["specialty"];
			$hospital = $_POST["hospital"];

			$query="INSERT INTO doctor VALUES('" . $firstname . "','" . $lastname . "','" . $licensenum . "','" . $date . "','" . $specialty . "','" . $hospital . "');";
			if (!mysqli_query($connection, $query)) {
				die("Error: insert failed since the license number already exist.");
			}
			echo "The Doctor " . $firstname . " " . $lastname . " was added!";
		?>
		<?php
            mysqli_close($connection);
        ?>
	</body>
	<br>
	<button onclick="goBack()">BACK</button>
</html>