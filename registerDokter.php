<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transational//EN" "http://www.w3.org/TR/xhtmli/DTD/xhmil-transitional.dtd">
<html xmlns="http.://www.w3.org/1999/xhtml">
<head><title>klinik ajwa</title>
<meta http-equiv="content-type" content="text/html"; charset="utf-8" />

<body>
<?php
include ("header.php");?>

<?php
		//this query is about inserting file
		if ($_SERVER['REQUEST_METHOD']== 'POST') {
	$error = array();

if (empty($_POST['firstName'])) {
	$error [] = 'you forgot to enter your first name.';
}
else{
	$n = mysqli_real_escape_string($connect, trim($_POST['firstName']));
}

if (empty($_POST['lastName'])) {
	$error [] = 'you forgot to enter your last name.';
}
else{
	$l = mysqli_real_escape_string($connect, trim($_POST['lastName']));
}
if (empty($_POST['specialization'])) {
	$error [] = 'you forgot to enter your specialization.';
}
else{
	$s = mysqli_real_escape_string($connect, trim($_POST['specialization']));
}

if (empty($_POST['password'])) {
	$error [] = 'you forgot to enter your password.';
}
else{
	$p = mysqli_real_escape_string($connect, trim($_POST['password']));
}

		//register the user database
		//making of the query
		$q = "insert INTO dokter (ID,firstName,lastName,specialization,password)
		VALUES ('','$n','$l','$s','$p')";
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
	<h2 align="center" >register dokter</h2>
	<h4>* required field</h4>
	<form action="registerDokter.php" method="post">
		<p><label class="label" for ="firstName">first name: *</label>
			<input id="firstName" type="text" name="firstName" size="30" maxlength="150"
			value="<?php if (isset($_post['firstName'])) echo $_post ['firstName']; ?>"></p>

			<p><label class="label" for ="lastName">last name: *</label>
			<input id="lastName" type="text" name="lastName" size="30" maxlength="60"
			value="<?php if (isset($_post['lastName'])) echo $_post ['lastName']; ?>"></p>

			<p><label class="label" for ="specialization">specialization: *</label>
			<input id="specialization" type="text" name="specialization" size="12" maxlength="12"
			value="<?php if (isset($_post['specialization'])) echo $_post ['specialization']; ?>"></p>

			<p><label class="label" for ="password">password: *</label></p>
			<textarea name="password" rows="5" cols="40"><?php if (isset($_post ['password'])) echo $_post ['password']; ?></textarea>
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