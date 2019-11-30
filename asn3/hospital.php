<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Hospital</title>
		<link rel="stylesheet" type="text/css" href="hospital.css">
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
		<h2>Show Hospital</h2>
		<div class="show">
		<?php
			$query = "SELECT * FROM hospital,doctor WHERE hospital.head=doctor.licensenum ORDER BY hospital.name";
			$result = mysqli_query($connection,$query);
			if (!$result) {
				die("databases query failed.");
			}
			echo "<ol>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<li>";
				echo $row["name"] . ", " . $row["city"] . ", " . $row["province"] . "<br>";
				echo "Head Doctor: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
				echo "Doctor's Start Date: " . $row["dateofheadstart"];
				echo "</li>";
				echo "<br>";
			}
			echo "<br>";
			mysqli_free_result($result);
			echo "</ol>";
		?>
		</div>
		<h2> Modify Hospital</h2>
		<div class="modify">
		<h4>Update Hospital's Name:</h4>
		<div class="modify1">
		<form action="hospitalupdate.php" method="post">
			<lable>Select a hospital to update:</lable>
			<select name="code">
			<?php
				$query = "SELECT * FROM hospital;";
				$result = mysqli_query($connection,$query);
				if (!$result) {
					die("databases query failed.");
				}
				while ($row = mysqli_fetch_assoc($result)) {
					echo '<option value="';
					echo $row["code"] . '">';
					echo $row["name"] . ", " . $row["city"];
					echo ", " . $row["province"] . '</option>';
				}
				mysqli_free_result($result);
			?>
			</select>
			<br><br>
			<lable>New Name: </lable><input type="text" name="name"><br>
			<input type="submit" value="UPDATE">
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