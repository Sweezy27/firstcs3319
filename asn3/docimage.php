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
		<h3>Show the doctor's image:</h3>
		<?php
			$licensenum = $_POST["licensenum"];
			$query="SELECT * FROM doctor WHERE licensenum='" . $licensenum . "'";
			$result = mysqli_query($connection,$query);
			if (!$result) {
				die("databases query failed.");
			}
		
			$row = mysqli_fetch_assoc($result);
			echo "<p>Name: " . $row["firstname"] . " " . $row["lastname"] . "</p>";
			echo "<p>License Number: " . $row["licensenum"] . "</p>";
			if($row["docimage"] == NULL){
				echo "<p>Warning: No image for the doctor</p>";
				echo "<p>Please add image:</p>";
				echo "<form action='docimage2.php' method='post'>";
				echo "";
				echo "<lable>Add url: </lable><input type='text' name='url'>  ";
				echo '<input type="hidden" name="licensenum" value="' . $row["licensenum"] . '">';
				echo '<input type="submit" value="ADD">';
				echo "</form>";
			}
			else{
				echo "<image src='" . $row["docimage"] . "' style='width:256px;height:256px'";
			}
		?>
		<?php
            mysqli_close($connection);
        ?>
	</body>
<br>
<button onclick="goBack()">BACK</button>
</html>