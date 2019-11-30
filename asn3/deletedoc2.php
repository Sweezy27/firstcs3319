<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Doctor</title>
	</head>
	<script>
		function goBack() {
		  window.history.go(-2);
		}
	</script>
	<body>
	<?php
		include 'connectdb.php';
	?>
	<?php
		$query="DELETE FROM doctor WHERE licensenum='" . $_POST["licensenum"] . "';";
		if (!mysqli_query($connection, $query)) {
			die("Error: delete failed.");
		}
		echo "The Doctor was successfully deleted!";
	?>
	<?php
        mysqli_close($connection);
    ?>
	</body>
<br>
<button onclick="goBack()">BACK</button>
</html>