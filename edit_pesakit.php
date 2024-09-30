<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.0 transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional/DTD">
<html xn1ns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="includes.css"/>
</head>

<body>
	
<?php include ("header.php");?>

<h2> EDIT a record</h2>

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
	$error = array();

	if (empty($_POST['firstName_p'])) {
		$error[] = 'you forgot to enter the first name.';
	 }else {
		$n = mysqli_real_escape_string($connect, trim($_POST['firstName_p']));
	}
	
	if (empty($_POST['lastName_p'])) {
		$error[] = 'you forgot to enter the last name.';
	} else {
		$l = mysqli_real_escape_string($connect, trim($_POST['lastName_p']));
	}
	if (empty($_POST['insurance_number'])) {
		$error[] = 'you forgot to enter the insurance number.';
	 }else {
		$i = mysqli_real_escape_string($connect, trim($_POST['insurance_number']));
	}
	if (empty($_POST['diagnose'])) {
		$error[] = 'you forgot to enter the diagnose.';
	}else {
		$d = mysqli_real_escape_string($connect, trim($_POST['diagnose']));
	}
	

	if (empty($error)) {
		$q = "SELECT id_p FROM pesakit WHERE insurance_number = '$i' AND id_p != $id";

		$result = @mysqli_query($connect, $q);

		if (mysqli_num_rows($result) == 0) {
			$q = "UPDATE pesakit SET firstName_p='$n',lastName_p = '$l',insurance_number = '$i', diagnose ='$d' WHERE id_p = '$id' LIMIT 10";

				$result = @mysqli_query($connect, $q);

				if (mysqli_affected_rows($connect)== 1) {

					echo '<h3>the user has been updated</h3>';
				 }else {
					echo '<p class="error">the user has not been updated due to error</p>';
					echo '<p>'.mysqli_error($connect). '<br/> query; '.$q.'</p>';
				}

				}else{
					echo '<p class="error">the no ic already been registered</p>';
				}

			}else {
				echo '<p class="error">the following error(s) occured: <br/>';
				foreach ($error as $msg)
			{
				echo " -$msg<br/> \n";
			}
		echo '</p><p>please try again.</p>';
		}	
		}

		$q = "SELECT firstName_p,lastName_p,insurance_number,diagnose FROM pesakit WHERE id_p=$id";
		$result = @mysqli_query ($connect,$q);

		if (mysqli_num_rows($result) == 1) {

			$row = mysqli_fetch_array ($result, MYSQLI_NUM);

			echo '<form action = "edit_pesakit.php" method="POST">
				<p><label class="label" for="firstName_p"> First name:</label>
					<input id ="firstName_p" type="text" name="firstName_p" size="30" maxlength="30" value="'.$row[0].'"></p>
				<p><label class="label" for="lastName_p"> last name: </label>
					<input id ="lastName_p" type="text" name="lastName_p" size="30" maxlength="30" value="'.$row[1].'"></p>
				<p><label class="label" for="insurance_number"> insurance number: </label>
					<input id ="insurance_number" type="text" name="insurance_number" size="30" maxlength="30" value="'.$row[2].'"></p>
				<p><label class="label" for="diagnose"> diagnose: </label>
					<input id ="diagnose" type="text" name="diagnose" size="30" maxlength="30" value="'.$row[3].'"></p>

					<br><p><input id="submit" type="submit" name="submit" value="edit"></p>
					<br><input type="hidden" name="id" value="'.$id.'"/>

				</form>';
		} else {
			echo '<p class="error">the page is in error.</p>'; 
		}

mysqli_close ($connect);
?>
</body>
</html>