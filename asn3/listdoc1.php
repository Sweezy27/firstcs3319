<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Doctor</title>
	<link rel="stylesheet" type="text/css" href="listdoc.css">
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
<h1>List of Doctors: </h1>
<div class="show">
	<h2>Select one for more information:</h2>
	<div class="list1">
	<?php
		$variable_type = $_POST["vt"];
		$order_type = $_POST["ot"];
		$query = "SELECT * FROM doctor ORDER BY " . $variable_type . " " . $order_type . ";";
		$result = mysqli_query($connection,$query);
		if (!$result) {
			die("databases query failed.");
		}
		echo "<ol>";
		echo '<form action="listdoc2.php" method="post">';
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<li id='listdoc'>";
			echo '<input type="radio" name="licensenum" value="';
			echo $row["licensenum"] . '">';
			echo $row["firstname"] . " " . $row["lastname"] . "<br>";
			echo "</li>";
		}
		echo "<br>";
		echo '<input type="submit" value="SELECT">';
		echo '</form>';
		mysqli_free_result($result);
		echo "</ol>";
	?>
	</div>
</div>

<?php
	mysqli_close($connection);
?>
<br>
<button onclick="goBack()">BACK</button>
</body>
</html>