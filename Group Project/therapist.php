<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<h1>Therapist Information</h1> <br><br>

	<?php
	require("dbconn.php");
	//if form is not submitted, show form
        if(!isset($_POST['submit'])) {
	$sql = 'select tID,name from Therapist';
	echo '<br><h3> Please select a Therapist: </h3><br>';
	echo '<form action="therapist.php" method="POST">';
	echo '<select name=theran>'; //thern = therapist name

	foreach($pdo->query($sql) as $row)
	{
	echo '<option value="';
	echo $row['tID'];
	echo '">';
	echo $row['name'];
	echo '</option>';
	}
	echo '</select>';
	echo '<br><input type="submit" name="submit" value="show">';
	echo '</form>';
	} else {
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$tid = $_POST['theran'];
		$sql = "select name from Therapist where tID = $tid";
		$nm = ($pdo->query($sql))->fetch(PDO::FETCH_ASSOC);
		echo '<h3> Hello, '.$nm['name'].'. Here are your patients: </h3><br>';

		$sql = "select p.name, p.age, p.contact from Patient p, Therapist, Appointments a where a.tID = $tid and a.pID = p.pID group by p.pID";		
		echo '<br>';
		echo '<table border="1">';
		echo '<tr>';
		echo '<th>Patient Name</th><th>Patient Age</th><th>Patient Phone #</th>';
		echo '</th>';
		echo '<form action="therapist.php" method="POST">';
		foreach($pdo->query($sql) as $row)
		{
			echo '<tr>';
			echo '<td>';
			echo $row['name'];
			echo '</td>';
			echo '<td>';
			echo $row['age'];
			echo '</td>';
			echo '<td>';
			echo $row['contact'];
			echo '</td>';
			echo '</tr>';
		}
		echo '</table>';
	}
	}
	echo '<br>';
	include 'footer.html';
	?>
</body>
</html>
