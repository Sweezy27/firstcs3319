<?php
	$query = "SELECT * FROM doctor;";
    $result = mysqli_query($connection,$query);
    if (!$result) {
        die("databases query failed.");
    }
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="';
		echo $row["licensenum"] . '">';
		echo $row["firstname"] . " " . $row["lastname"];
		echo "</option>";
    }
    mysqli_free_result($result);
?>