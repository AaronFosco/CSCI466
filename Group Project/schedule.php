<html>
	<head>
		<title>Daily Schedule</title>
	</head>
	<body>
		<h1> Daily Schdedule</h1>  <br></br>
		<?php
		require "dbconn.php";
		echo '<form action="schedule.php" method="post">';
			echo '<select name="Appointments">';
			$sql = 'SELECT * FROM Appointments ORDER BY date';
			$q   = $pdo->query($sql) or die("ERROR: " . implode(":", $pdo->errorInfo()));

			while ($row=$q->fetch(PDO::FETCH_ASSOC)) {
				echo '<option value="'.$row['date'].'">'.$row['date'].'</option>';
			}
			echo '</select>';
			echo '<br><input type="submit" name="submit" value="Show"><br>';
		echo '</form>';
		if ($_SERVER['REQUEST_METHOD']=='POST') {
			$date = $_POST['Appointments'];
			echo '<h3> Here are all the appointments for '.$date.': </h3><br>';

			$sql = "select t.name as tName, p.name as pName, a.bodypart, a.duration, a.time from Therapist t, Patient p, Appointments a where a.date = '$date' and a.tID = t.tID and a.pID = p.pID";
			
			echo '<br>';
			echo '<table border="1">';
			echo '<tr>';
			echo '<th>Time</th><th>Therapist</th><th>Patient Name</th><th>Body Part</th><th>Duration (minutes)</th>';
			echo '</th>';
			echo '<form action="schedule.php" method="POST">';

			foreach($pdo->query($sql) as $row) {
				echo '<tr>';
				echo '<td>';
				echo $row['time'];
				echo '</td>';
				echo '<td>';
				echo $row['tName'];
				echo '</td>';
				echo '<td>';
				echo $row['pName'];
				echo '</td>';
				echo '<td>';
				echo $row['bodypart'];
				echo '</td>';
				echo '<td>';
				echo $row['duration'];
				echo '</td>';
				echo '</tr>';
			}
			echo '</table>';
		}

		?>
		<?php include 'footer.html' ?>
	</body>
</html>
