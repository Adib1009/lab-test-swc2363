<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transational//EN" "http://222.23.org/tr/xhtml1/DTD/xhtml1-transational.dtd">
<html xmlns="http://www.w3.org/1999/html">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>klinik ajwa</title>
</head>

<body>
	
<?php include("header.php"); ?>

<h2>search result</h2>

<?php

$in = $_POST ['insurance_number'];
$in =mysqli_real_escape_string ($connect, $in);

$q = "SELECT id_p,firstName_p,lastName_p,insurance_number,diagnose FROM pesakit WHERE insurance_number = '$in' ORDER BY id_p";

$result = @mysqli_query ($connect, $q);

if($result) {
	echo '<table border="2">
	<tr><td><b>ID_pesakit </b></td>
	<td><b>First name</b></td>
	<td><b>Last name</b></td>
	<td><b>Insurance number</b></td>
	<td><b>diagnose</b></td></tr>';


	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		// code...
		echo '<tr>
		<td>'.$row ['id_p'].'</td>
		<td>'.$row ['firstName_p'].'</td>
		<td>'.$row ['lastName_p'].'</td>
		<td>'.$row ['insurance_number'].'</td>
		<td>'.$row ['diagnose'].'</td>
		</tr>';
		
	}
	//close table
	echo '</table>';

	//free up resources
	mysqli_free_result ($result);

	//if failed
	}else {

	echo '<p class="error">if no record are shown this is because you had an incorrect input that result in missing entry at the search form.<br>click the button at the browser and try again</p>';
	echo '<p>'.mysqli_error($connect). '<br><br/>query:'.$q.'</p>';
}
mysqli_close ($connect);
?>
</body>
</html>