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
<h1>List of doctors who has no patient: </h1>
<?php
    $query = "SELECT firstname,lastname FROM doctor WHERE licensenum NOT IN (SELECT DISTINCT licensenum FROM treating);";
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
	echo "<br>";
    mysqli_free_result($result);
    echo "</ol>";
?>

<?php
	mysqli_close($connection);
?>
<br>
<button onclick="goBack()">BACK</button>
</body>
</html>