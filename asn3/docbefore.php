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
	$date = $_POST["date"];
	echo "<h2>List of doctors who be licensed before " . $date . "</h2>";
    $query = "SELECT * FROM doctor WHERE datebelicensed<'" . $date . "';";
    $result = mysqli_query($connection,$query);
    if (!$result) {
        die("databases query failed.");
    }
	echo "<ol>";
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<li>";
		echo "Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
		echo "License Number: " . $row["licensenum"] . "<br>";
		echo "Date be Licensed: " . $row["datebelicensed"] . "<br>";
		echo "Specialty: " . $row["specialty"] . "<br>" . "</li>" . "<br>";
	}
	echo "</ol>";
    mysqli_free_result($result);
?>

<?php
	mysqli_close($connection);
?>
<button onclick="goBack()">BACK</button>
</body>
</html>