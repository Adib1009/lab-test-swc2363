<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transational//EN" "http://www.w3.org/TR/xhtmli/DTD/xhmil-transitional.dtd">
<html xmlns="http.://www.w3.org/1999/xhtml">
<head><title>klinik ajwa</title>
<meta http-equiv="content-type" content="text/html"; charset="utf-8" />

<body>
<?php
include ("header.php");?>

<?php

if ($_SERVER['REQUEST_METHOD']== 'POST') {
	$error = array();

if (empty($_POST['firstName_p'])) {
	$error [] = 'you forgot to enter your first name.';
}
else{
	$n = mysqli_real_escape_string($connect, trim($_POST['firstName_p']));
}

if (empty($_POST['lastName_p'])) {
	$error [] = 'you forgot to enter your last name.';
}
else{
	$l = mysqli_real_escape_string($connect, trim($_POST['lastName_p']));
}
if (empty($_POST['insurance_number'])) {
	$error [] = 'you forgot to enter your insurance number.';
}
else{
	$i = mysqli_real_escape_string($connect, trim($_POST['insurance_number']));
}

if (empty($_POST['diagnose'])) {
	$error [] = 'you forgot to enter your diagnose.';
}
else{
	$d = mysqli_real_escape_string($connect, trim($_POST['diagnose']));
}

		//register the user database
		//making of the query
		$q = "Insert INTO pesakit (id_p,firstName_p,lastName_p,insurance_number,diagnose)VALUES ('','$n','$l','$i','$d')";
		$result = @mysqli_query ($connect, $q);
		if ($result){
			echo '<h1>thank you</h1>';
			exit();
		}else{
			echo '<h1>system error</h1>';

			echo '<p>'.mysqli_error($connect).'<br><br>query:'.$q.'</p>';
		}
		mysqli_close($connect);
		exit();
		}
	?>
<h2>register</h2>
<h4>* required field</h4>
<form action="register.php" method="post">
<p><label class="label" for ="firstName_p">first name: *</label>
<input id="firstName_p" type="text" name="firstName_p" size="30" maxlength="150"
value="<?php if (isset($_post['firstName_p'])) echo $_post ['firstName_p']; ?>"></p>

<p><label class="label" for ="lastName_p">last name: *</label>
<input id="lastName_p" type="text" name="lastName_p" size="30" maxlength="60"
value="<?php if (isset($_post['lastName_p'])) echo $_post ['lastName_p']; ?>"></p>

<p><label class="label" for ="insurance_number">insurance number: *</label>
<input id="insurance_number" type="text" name="insurance_number" size="12" maxlength="12"
value="<?php if (isset($_post['insurance_number'])) echo $_post ['insurance_number']; ?>"></p>

<p><label class="label" for ="diagnose">diagnose: *</label></p>
<textarea name="diagnose" rows="5" cols="40"><?php if (isset($_post ['diagnose'])) echo $_post ['diagnose']; ?></textarea>
<p><input id="submit" type="submit" name="submit" value="register"/>&nbsp;&nbsp;
<input id="reset" type="reset" name="reset" value="clear all"/>
</p>
</form>
<p>
<br />
<br />
<br />
</body>
</html>