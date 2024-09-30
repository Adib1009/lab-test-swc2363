<!DOCTYPE html PUBLIC "-//W3C/DTD XHTML 1.0 Transational//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-traansitional.dtd">
<hyml xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>klinik ajwa</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
	</head>

	<body>
		
	<?php
	//call file to connect server
	require ("header.php");


	if ($_SERVER['REQUEST_METHOD']=='POST') {

		if(!empty($_post['id']))  {
			$un =mysqli_real_escape_string($connect,$_POST ['id']);
		} else{
			$un =FALSE;
			echo '<p class ="error"> you forgot to enter your ID.</p>';
		}
		if(!empty($_post['password']))  {
			$un =mysqli_real_escape_string($connect,$_POST ['password']);
		} else{
			$un =FALSE;
			echo '<p class ="error"> you forgot to enter your password.</p>';
		}
		if ($un && $p) {

			$q = "SELECT id,firstName,lastName,specialization,password FROM dokter WHERE (ID = '$un' AND password = '$p')";
			$result = mysqli_query($connect, $q);

			if (@mysqli_num_rows ($result) == 1) {
				session_start();
				$_SESSION = mysqli_fetch_array ($result,MYSQLI_ASSOC);
				echo '<p> lolol</p>';
				exit();

				mysqli_free_result ($result);
				mysqli_close ($connect);
			} else {
				echo '<p class = "error"> please try again</p>';
			}
			mysqli_close ($connect);
		}
	}

		?>
<h2 align="center" >login</h2>

<form action="login.php" method="post">
	
	<p><label class="label" for ="id">ID:</label>
		<input id="id" type="text" name="id" size="4" maxlength="6" value="<?php if (isset($_post['id'])) echo $_POST['id'] ?>"></p>

		<p><label class="label" for ="password">password:</label>
		<input password="password" type="text" name="password" size="15" maxlength="30" value="<?php if (isset($_post['password'])) echo $_POST['password'] ?>"></p>
		<p>&nbsp;</p>
		<p align="left"><input id = "submit" type = "submit" name="submit" value="login">
			&nbsp;
		<p align="left"><input id = "reset" type = "reset" name="reset" value="reset"/></p>
</form>
<p align="center"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; don't have an account?
<a href="register.php">sign up</a>
		
		
</p>
</div>
</div>
</body>
</html>