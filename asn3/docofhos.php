<?php
	$query = "SELECT * FROM doctor,hospital WHERE doctor.workoutof=hospital.code GROUP BY code";
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