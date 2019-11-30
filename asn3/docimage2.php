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
			$licensenum = $_POST["licensenum"];
			$url = $_POST["url"];
			$query="UPDATE doctor SET docimage='" . $url . "' WHERE licensenum='" . $licensenum  . "';";
			if (!mysqli_query($connection, $query)) {
				die("Error: image url too long.");
			}
			echo "The image of doctor was added!";
		?>
		<?php
            mysqli_close($connection);
        ?>
	</body>
	<br>
	<button onclick="goBack()">BACK</button>
</html>