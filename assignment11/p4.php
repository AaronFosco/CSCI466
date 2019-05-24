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
		echo '<form action="p4.php" method="POST">';
		echo '<h3>Please enter your First and Last Name:</h3><br>';
		echo 'First Name: ';
		echo '<input type="text" name="fname" placeholder="First Name">';
		echo 'Last Name: ';
		echo '<input type="text" name="lname" placeholder="Last Name"><br>';
		echo '<h3>Please enter your full adress:</h3><br>';
		echo 'Address: ';
		echo '<input type="text" name="address" placeholder="Adress">';
		echo 'City: ';
		echo '<input type="text" name="city" placeholder="City"><br>';
		echo 'Two Letter State: ';
		echo '<input type="text" name="state" placeholder="State">';
		echo 'Zip Code: ';
		echo '<input type="text" name="zip" placeholder="Zip Code"><br>';
		echo '<input type="submit" name="ownerinfo">';
		echo '<input type="reset">';
		
		echo '</form>';
		
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$fn = $_POST['fname'];
			$ln = $_POST['lname'];
			$adr = $_POST['address'];
			$ct = $_POST['city'];
			$st = $_POST['state'];
			$zip = $_POST['zip']; 
			$sql = "insert into Owner(LastName, FirstName, Address, City, State, Zip) values('$fn', '$ln', '$adr', '$ct', '$st', '$zip')";
			$conn->query($sql);
			if($conn)
			{ 
			   echo '<br><h4>Data Entered Sucessfuly</h4>';
			   echo 'Name: '.$fn.' '.$ln.'<br>';
			   echo 'Address:<br>';
			   echo $adr.', '.$ct.'<br>'.$st.', '.$zip.'<br>';	
			} else {
			   echo '<br><h4>Data Wasn\'t Entered Sucessfuly</h4>';
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
