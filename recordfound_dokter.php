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

$id = $_POST ['id'];
$id =mysqli_real_escape_string ($connect, $id);

$q = "SELECT id,firstName,lastName,specialization,password FROM dokter WHERE id = '$id' ORDER BY id";

$result = @mysqli_query ($connect, $q);

if($result) {
	echo '<table border="2">
	<tr><td><b>ID_dokter </b></td>
	<td><b>First name</b></td>
	<td><b>Last name</b></td>
	<td><b>specialization</b></td>
	<td><b>password</b></td></tr>';


	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		// code...
		echo '<tr>
		<td>'.$row ['id'].'</td>
		<td>'.$row ['firstName'].'</td>
		<td>'.$row ['lastName'].'</td>
		<td>'.$row ['specialization'].'</td>
		<td>'.$row ['password'].'</td>
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