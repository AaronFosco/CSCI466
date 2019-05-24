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
	   $sql = 'select BoatName,SlipID from MarinaSlip';
	   echo '<h3> select a boatname to view its Services</h3><br>';
	   echo '<form action="p3.php" method="post">';
	   echo '<select name="boat">';
	   
	   foreach($conn->query($sql) as $row)
	   {
	      echo '<option value="';
	      echo $row["SlipID"];
	      echo '">';
	      echo $row["BoatName"];
	      echo '</option>';
	   }
	   echo '</select>';
	   echo '<br><input type="submit" name="submit"';
	   echo 'value="show">';
	   echo ' <input type="reset"><br>';
	   
	   echo '</form>';
	   
	   if($_SERVER['REQUEST_METHOD'] == 'POST')
	   {
	      $boat = $_POST['boat'];
	      $sql = "select Description, Status, EstHours, SpentHours from ServiceRequest where SlipID = $boat";
	      
	      echo '<table border="1">';
	      echo '<tr>';
	      echo '<th>Description:</th><th>Status:</th><th>Est Hours</th><th>Spent Hours</th>';
	      echo '</tr>';
	      
	      foreach($conn->query($sql) as $row)
	      {
	         echo '<tr>';
		 echo '<td>';
	         echo $row['Description'];
		 echo '</td>';
		 echo '<td>';
		 echo $row['Status'];
		 echo '</td>';
		 echo '<td>';
		 echo $row['EstHours'];
		 echo '</td>';
		 echo '<td>';
		 echo $row['SpentHours'];
		 echo '</td>';
		 echo '</tr>';
	      }
	      echo '</table>';
	   }
	
	?>
	
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
