<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transational//EN" "http://222.23.org/tr/xhtml1/DTD/xhtml1-transational.dtd">
<html xmlns="http://www.w3.org/1999/html">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>klinik ajwa</title>
</head>

<body>
	
<?php
//extract($_post)

//connect to server
$connect = mysqli_connect ("localhost","root","","klinik_ajwa");

if (!$connect){
	die('ERROR:'.mysqli_connect_error());
} else{
	echo "connected to database";
}

?>
</body>
</html>