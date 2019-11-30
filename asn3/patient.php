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
		<h2>Show Patient</h2>
		<form action="patientshow.php" method="post">
			<lable>Enter OHIP: </lable><input type="text" name="ohip">(9-digit number)<br>
			<br>
			<input type="submit" value="SEARCH">
		</form>	
	</body>
	<br>
	<button onclick="goBack()">BACK</button>
</html>