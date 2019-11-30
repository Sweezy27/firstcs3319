<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Treating</title>
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
			$ohip = $_POST["ohip"];
			$query="INSERT INTO treating VALUES('" . $licensenum . "','" . $ohip . "');";
			if (!mysqli_query($connection, $query)) {
				die("Error: add failed.");
			}
			echo "The new assigning was added!";
		?>
				
		<?php
            mysqli_close($connection);
        ?>
	</body>
	<br>
	<button onclick="goBack()">BACK</button>
</html>