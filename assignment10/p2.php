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
	$sql = 'select LastName,OwnerNum from Owner';
	echo '<h3> select a Owner (lastName)</h3><br>';
	echo '<form action="p2.php" method="POST">';
	echo '<select name=owner>';
	
	foreach($conn->query($sql) as $row)
	{
	   echo '<option value="';
	   echo $row['OwnerNum'];
	   echo '">';
	   echo $row['LastName'];
	   echo '</option>';
	}
	echo '</select>';
	echo '<br><input type="submit" name="submit value="show">';
	echo ' <input type="reset"><br>';
	echo '</form>';
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
	   $owner = $_POST['owner'];
	   $sql = "select BoatName from MarinaSlip where OwnerNum = $owner";
	   echo '<h3>Boats Owned: <h3><br>';
	   foreach($conn->query($sql) as $row)
	      {
	         echo $row['BoatName'].'<br>';
	      } 
	  }
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
