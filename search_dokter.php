<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.0 transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional/DTD">
<html xn1ns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="includes.css"/>
<title>klinik ajwa</title>
</head>

<body>
	
<?php include ("header.php");?>

<form action="recordfound_dokter.php" method="post">
	
	<h1>search record dokter</h1>
	<p><label class="label" for="id"> id: </label>
		<input id="id" type="text" name="id" size="30" maxlength="30" value="<?php if (isset($_POST['id'])) echo $_POST ['id']; ?>"/></p>

		<p><input id="submit" type="submit" name="submit" value="search"/></p>
</form>
</body>
</html>