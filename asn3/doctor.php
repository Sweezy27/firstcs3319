<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Doctor</title>
		<link rel="stylesheet" type="text/css" href="doctor.css">
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
		<h2>Show Doctor</h2>
		<div class="show">
			<h3>1. Show all doctors by selected order:</h3>
			<div class="show1">
				<form action="listdoc1.php" method="post">
					<label>Order by:</label>
					<input type="radio" name="vt" value="firstname"><lable>Fisrst Name</lable>
					<input type="radio" name="vt" value="lastname"><lable>Last Name</lable><br>
					<br>
					<lable>Order type:</lable>
					<input type="radio" name="ot" value="ASC"><lable>Ascending</lable>
					<input type="radio" name="ot" value="DESC"><lable>Descending</lable><br>
					<br>
					<input type="submit" value="SUBMIT">
				</form>
			</div>
				<h3>2. Show all doctors licensed before: </h3>
				<div class="show2">
				<form action="docbefore.php" method="post">
					<lable>Enter the date: </lable><input type="date" name="date">
					<input type="submit" value="SUBMIT">
				</form>
			</div>
			<h3>3. Show all doctors who has no patient: </h3>
				<div class="show3">
				<form action="docnopatient.php" method="post">
					<lable>Click the button to see:</lable>
					<button type="submit">CHECK</button>
				</form>
			</div>
		</div>
		<h2>Modify Doctor</h2>
		<div class="modify">
			<h3>1. Add Doctor:</h3>
			<div class="modify1">
				<form action="adddoc.php" method="post">
					<lable id="add">First Name: </lable><input type="text" name="firstname" id="add"><br>
					<lable id="add">Last Name: </lable><input type="text" name="lastname" id="add"><br>
					<lable id="add">License Number: </lable><input type="text" name="license" id="add"><lable id="add">(i.e. KH87)</lable><br>
					<lable id="add">Date be Licensed: </lable><input type="date" name="date" id="add"><br>
					<lable id="add">Specialty: </lable><input type="text" name="specialty" id="add"><br>
					<lable id="add">Work at (Hospital):</lable>
					<select name="hospital">
						<?php
							include "docofhos.php"
						?>
					</select>
					<br>
					<input type="submit" value="ADD">
				</form>
			</div>
			<h3>2. Delete Doctor:</h3>
			<div class="modify2">
				<form action="deletedoc.php" method="post">
					<lable>Doctor: </lable>
					<select name="licensenum">
						<?php
							include "doclistoption.php"
						?>
					</select>
					<input type="submit" value="DELETE">
				</form>
			</div>
			
			<h3>3. Add image for Doctor</h3>
			<div class="modify2">
			<form action="docimage.php" method="post">
				<label>Select:</label>
				<select name="licensenum">
					<?php
						include "doclistoption.php"
					?>
				</select>
				<input type="submit" value="SELECT">
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