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
			$query="DELETE FROM treating WHERE licensenum='" . $licensenum . "' AND ohip='" . $ohip . "';";
			if (!mysqli_query($connection, $query)) {
				die("Error: delete failed.");
			}
			echo "The treating was deleted!";
		?>
				
		<?php
            mysqli_close($connection);
        ?>
	</body>
	<br>
	<button onclick="goBack()">BACK</button>
</html>