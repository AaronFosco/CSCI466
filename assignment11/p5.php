<html>
<head>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div id="header">
		<h1> Assignment - 11 </h1>
	</div>
	<div id="mainsec">
	<br>
		<?php
		require("dbconn.php");
		echo '<form action="p5.php" method="POST">';
		echo '<h3>Select a Boat and a Service catagory</h3>';
		$sql = 'select BoatName,SlipID from MarinaSlip';
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
		
		echo '<select name="svcat">';
		$sql = "select CategoryNum, CategoryDescription from ServiceCategory";
		foreach($conn->query($sql) as $row)
	   	{
	     	 echo '<option value="';
	     	 echo $row["CategoryNum"];
	         echo '">';
	     	 echo $row["CategoryDescription"];
	     	 echo '</option>';
	   	}
		echo '</select><br>';
		echo '<input type="submit" name="submit">';
		echo '<input type="reset" name="reset">';
		echo '</form>';
		
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
		   $catn = $_POST['svcat'];
		   $sid = $_POST['boat'];
		   $sql = "insert into ServiceRequest(SlipID, CategoryNum) values ('$sid', '$catn')";
		   $conn->query($sql);
		   if($conn)
		   {
		   	echo '<h4>Entry Success!</h4><br>';
		   } else {
		   	echo '<h4>entry failed!</h4>';
		   }
		}
		?>
	</div>
	<div id="footer">
		<table border="1" align="center">
		<tr>
			<td>
				<a href="/~z1835687/p4.php">Input a New Owner</a>
			</td>
			<td>
				<a href="/~z1835687/p5.php">Update Service Requests</a>
			</td>
		</tr>
		</table>
<pre>
  _______________________________________________________________
 /                                                               \
||  Course: CSCI-466    Assignment #: 11   Semester: Spring 2018 ||
||                                                               ||
||  NAME:  Aaron Fosco    Z-ID: z1835687     Section: 1          ||
||                                                               ||
||  TA's Name: Ishaan Mohammed                                   ||
||                                                               ||
||  Instructor's Name: Georgia Brown                             ||
||                                                               ||
||  Due: Wednesday 4/25/2018 by 11:59PM                          ||
||                                                               ||
||  Description:                                                 ||
||                                                               ||
||    This is the website page for assignment 11.                ||
 \_______________________________________________________________/
</pre>
	</div>
</body>
</html>
