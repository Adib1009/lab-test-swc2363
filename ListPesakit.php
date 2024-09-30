<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.0 transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional/DTD">
<html xn1ns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="includes.css"/>
</head>

<body>
	
<?php include ("header.php");?>

	<?php
	//make quary
	$q ="SELECT id_p, firstName_p,lastName_p,insurance_number, diagnose FROM pesakit ORDER BY id_p";

//run result
	$result = @mysqli_query ($connect, $q);

if($result)
{
	//table heading
	echo '<table border="2">
	<tr><td><b>edit</b></td>
	<td><b>delete</b></td>
	<td><b>ID_pesakit </b></td>
	<td><b>First name</b></td>
	<td><b>Last name</b></td>
	<td><b>Insurance number</b></td>
	<td><b>diagnose</b></td></tr>';

	//fetch print of all record
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		// code...
		echo '<tr>
		<td><a href = "edit_pesakit.php?id='.$row['id_p'].'">Edit<a/></td>
		<td><a href = "delete_pesakit.php?id='.$row['id_p'].'">Delete<a/></td>
		<td>'.$row ['id_p'].'</td>
		<td>'.$row ['firstName_p'].'</td>
		<td>'.$row ['lastName_p'].'</td>
		<td>'.$row ['insurance_number'].'</td>
		<td>'.$row ['diagnose'].'</td>
		</tr>';
		
	}
	//close table
	echo '</table';

	//free up resources
	mysqli_free_result ($result);

	//if failed
	}else {

		//error massage
		echo '<p class ="error">the current student cannot be retreived. we apologize for any inconvenience.</p>';

		//debugging message
		echo '<p>'.mysqli_error($connect). '<br><br/>query:'.$q.'</p>';
	}
	mysqli_close($connect);
	?>

</div>
</div>
</body>
</html>