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

	if (empty($_POST['firstName'])) {
		$error[] = 'you forgot to enter the first name.';
	 }else {
		$n = mysqli_real_escape_string($connect, trim($_POST['firstName']));
	}
	
	if (empty($_POST['lastName'])) {
		$error[] = 'you forgot to enter the last name.';
	} else {
		$l = mysqli_real_escape_string($connect, trim($_POST['lastName']));
	}
	if (empty($_POST['specialization'])) {
		$error[] = 'you forgot to enter the specialization.';
	 }else {
		$s = mysqli_real_escape_string($connect, trim($_POST['specialization']));
	}
	if (empty($_POST['password'])) {
		$error[] = 'you forgot to enter the password.';
	}else {
		$p = mysqli_real_escape_string($connect, trim($_POST['password']));
	}
	

	if (empty($error)) {
		$q = "SELECT id FROM dokter WHERE specialization = '$s' AND id != $id";

		$result = @mysqli_query($connect, $q);

		if (mysqli_num_rows($result) == 0) {
			$q = "UPDATE dokter SET firstName='$n',lastName = '$l',specialization = '$s', password ='$p' WHERE id = '$id' LIMIT 1";

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
	

		$q = "SELECT firstName,lastName,specialization,password FROM dokter WHERE id=$id";
		$result = @mysqli_query ($connect,$q);

		if (mysqli_num_rows($result) == 1) {

			$row = mysqli_fetch_array ($result, MYSQLI_NUM);

			echo '<form action = "edit_dokter.php" method="POST">
				<p><label class="label" for="firstName"> First name:</label>
					<input id ="firstName" type="text" name="firstName" size="30" maxlength="30" value="'.$row[0].'"></p>
				<p><label class="label" for="lastName"> last name: </label>
					<input id ="lastName" type="text" name="lastName" size="30" maxlength="30" value="'.$row[1].'"></p>
				<p><label class="label" for="specialization"> specialization: </label>
					<input id ="specialization" type="text" name="specialization" size="30" maxlength="30" value="'.$row[2].'"></p>
				<p><label class="label" for="password"> password: </label>
					<input id ="password" type="text" name="password" size="30" maxlength="30" value="'.$row[3].'"></p>

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