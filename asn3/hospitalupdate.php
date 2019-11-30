<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Hospital</title>
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
			$name = $_POST["name"];
			$code = $_POST["code"];
			$query = "UPDATE hospital SET name='" . $name . "' WHERE code='" . $code ."';";
			if (!mysqli_query($connection, $query)) {
				die("Error: update failed.");
			}
			echo "The hospital's was successfully updated!";
		?>
		<?php
            mysqli_close($connection);
        ?>
	</body>
	<br>
	<button onclick="goBack()">BACK</button>
</html>