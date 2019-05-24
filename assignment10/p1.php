<html>
<head>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div id="header">
		<h1> Assignment - 11 </h1>
	</div>
	
	<div id="mainsec">
	
	<?php
	require("dbconn.php");
	
	$sql = 'select BoatName,LastName,FirstName,Name,SlipNum from MarinaSlip, Owner, Marina where Owner.OwnerNum = MarinaSlip.OwnerNum and MarinaSlip.MarinaNum = Marina.MarinaNum';
	echo '<table border="1">';
	echo '<tr>';
	echo '<th>Boat Name</th><th>Owner Name</th><th>Marina Name</th><th>Slip Number</th>';
	echo '</tr>';
	foreach($conn->query($sql) as $row)
	{
	   echo '<tr>';
	   echo '<td>';
	   echo $row['BoatName'];
	   echo '</td>';
	   echo '<td>';
	   echo $row['FirstName'].' '.$row['LastName'];
	   echo '</td>';
	   echo '<td>';
	   echo $row['Name'];
	   echo '</td>';
	   echo '<td>';
	   echo $row['SlipNum'];
	   echo '</td>';
	   echo '</tr>';
	}
	echo '</table>'
	?>
	
	</div>
	
	<div id="footer">
		<table border="1" align="center">
		<tr>
			<td>
				<a href="/~z1835687/p1.php">Boat Table</a>
			</td>
			<td>
				<a href="/~z1835687/p2.php">Owner Boat lookup</a>
			</td>
			<td>
				<a href="/~z1835687/p3.php">Boat Services</a>
			</td>
		</tr>
		<pre>
  _______________________________________________________________
 /                                                               \
||  Course: CSCI-466    Assignment #: 10   Semester: Spring 2018 ||
||                                                               ||
||  NAME:  Aaron Fosco    Z-ID: z1835687     Section: 1          ||
||                                                               ||
||  TA's Name: Ishaan Mohammed                                   ||
||                                                               ||
||  Instructor's Name: Georgia Brown                             ||
||                                                               ||
||  Due: Wednesday 4/18/2018 by 11:59PM                          ||
||                                                               ||
||  Description:                                                 ||
||                                                               ||
||    This is the website page for assignment 11.                ||
 \_______________________________________________________________/
		</pre>
	</div>
</body>
</html>
