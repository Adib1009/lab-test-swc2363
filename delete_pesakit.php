<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.0 transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional/DTD">
<html xn1ns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="includes.css"/>
</head>

<body>
	
<?php include ("header.php");?>

<h2> delete a record</h2>

<?php

if ((isset ($_GET['id'])) && (is_numeric($_GET['id']))) {
	$id = $_GET['id'];
 }elseif ((isset ($_POST['id'])) && (is_numeric($_POST['id']))) {
	$id = $_POST['id'];
 }else {
	echo '<p class="error">this page has been accessed in error.</p>';
	exit();
}

if($_SERVER ['REQUEST_METHOD'] == 'POST') {
	if ($_POST['sure'] == 'yes') {

		$q = "DELETE FROM pesakit WHERE id_p=$id LIMIT 10";
		$result = @mysqli_query ($connect, $q);

		if (mysqli_affected_rows($connect) == 1) {

			echo'<h3>the record has been deleted</h3>';
		}else{

			'<p class="error">the record could not be deleted.<br> probably to system error.<p>';

				echo '<p>'.mysqli_error($connect).'<br/>Query:'.$q.'</p>';
		}
	}
	else{
		echo '<h3>the user has NOT been deleted</h3>';
	}
}else{
	$q = "SELECT firstName_p FROM pesakit WHERE id_p = $id";
	$result = @mysqli_query ($connect, $q);

	if (mysqli_num_rows($result) == 1) {

		$row =mysqli_fetch_array($result, MYSQLI_NUM);
		echo "<h3>are you sure you want to delete $row[0]?</h3>";
		echo '<form action="delete_pesakit.php" method="post">
			<input id="submit-no" type="submit" name="sure" value="yes">
			<input id="submit-no" type="submit" name="sure" value="no">
			<input type="hidden" name="id" value="'.$id.'">
		</form>';
	} else{
		echo '<p class="error">this page has been accessed in error</p>';
		echo '<p>&nbsp</p>';
	}
}
mysqli_close($connect);

?>
</body>
</html>