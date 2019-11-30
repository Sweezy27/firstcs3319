<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Treating</title>
		<link rel="stylesheet" type="text/css" href="treating.css">
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
		<h2>Assign a doctor to patient:</h2>
		<div class="modify">
		<h3>1. Add a treating:</h3>
		<div class="modify1">
		<form action="treatadd.php" method="post">
			<lable>Select a doctor: </lable>
			<select name="licensenum">
				<?php
					include "doclistoption.php"
				?>
			</select>
			<input type="submit" value="ADD">
		</form>	
			</div>
		
		<h3>2. Stop a treating:</h3>
			<div class="modify1">
		<form action="treatdelete.php" method="post">
			<lable>Select a doctor: </lable>
			<select name="licensenum">
				<?php
					include "doclistoption.php"
				?>
			</select>
			<input type="submit" value="STOP">
		</form>	
			</div>
		</div>
		
		<?php
            mysqli_close($connection);
        ?>
	</body>
	<br>
	<button onclick="goBack()">BACK</button>
</html>