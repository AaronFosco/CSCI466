<?php
require('dbconn.php');
echo '<html>';
echo '<form action="patient.php" method="POST"> ';
echo '<br><input type="submit" name="showPatients" value="Show Patients"> <br>';
echo '<br><input type="submit" name="showTherapists" value="Show Therapists"> <br>';
echo '<br><input type="submit" name="showSchedule" value="Show Schedule"> <br>';

	echo "<select name = 'bodypart'>";
$sql="select bodypart from Exercises";
$q   = $pdo->query($sql);
while ($row=$q->fetch(PDO::FETCH_ASSOC))
{
	echo '<option value='.$row['bodypart'].'>'.$row['bodypart'].'</option>';
}
echo '</select>';

	echo '<select name = date>';
$sql = 'select date from Appointments';
$w = $pdo->query($sql);
while ($row=$w->fetch(PDO::FETCH_ASSOC))
{
	echo '<option value='.$row['date'].'>'.$row['date'].'</option>';
}
echo '</select><br>';
//echo '<input type="date" name="date">'; will alow for the user to select a date for input

echo '<br><input type="submit" name="addExercises" value="Add Exercises"> <br>';
echo '<br><input type="reset" name="Reset" value="Reset"> <br>';
echo '</form>';


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['showPatients']))
	{
		$sql='select name from Patient';
		echo '<table style="width:100%" border=1>';
			foreach($pdo->query($sql) as $row )
			{
				echo '<tr>';
				echo '<td>'.$row['name'].'</td>';
				echo '</tr>';
			}
		echo '</table>';
	}
    if (isset($_POST['showTherapists']))
	{
		$sql='select name from Therapist';
		echo '<table style="width:100%" border=1>';
			foreach($pdo->query($sql) as $row )
			{
				echo '<tr>';
				echo '<td>'.$row['name'].'</td>';
				echo '</tr>';
			}
		echo '</table>';	
	}
    if (isset($_POST['showSchedule']))
	{
		$sql='select p.name as pn, t.name as tn, a.date from Appointments a, Patient p, Therapist t where a.pID=p.pID and a.tID=t.tID';
		echo '<table style="width:100%" border=1>';
			foreach($pdo->query($sql) as $row )
			{
				echo '<tr>';
				echo '<td>'.$row['pn'].'</td>';
				echo '<td>'.$row['tn'].'</td>';
				echo '<td>'.$row['date'].'</td>';
				echo '</tr>';
			}	
		echo '</table>';
	}
    if (isset($_POST['addExercises']))
	{
		$exer=$_POST['bodypart'];
		$dat=$_POST['date'];
		$sql="Update Appointments set Appointments.bodypart='$exer' where Appointments.date='$dat'";
		$pdo->query($sql);
	}

}

echo '</html>';

include 'footer.html';



?>

