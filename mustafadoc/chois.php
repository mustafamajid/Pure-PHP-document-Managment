<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body style="background-image:url(IMG_5840.JPG) >
<?php
	
	session_start();
	include('master.php');
	if($_SESSION['cpage']!='chois')
	header('location: login.php');


	if(isset($_POST['addnew']))
	{
	    $_SESSION['cpage']='adding';
		header('location:adding.php');
	}
	
		if(isset($_POST['display']))
	{
		  $_SESSION['cpage']='display';
		header('location: display.php');
	}
	
?>
    <div style="padding-left: 100px;padding-right: 100px" align="center">
	<table>
		<tr>
			<td align="center">
				<form name="add"  method="post" action="chois.php">
        <img src="img/insert.jpg" width="350" height="300"/><br>
		<input type="submit"  width="300" value="اضافة كتاب" name="addnew">
				</form>
			</td>
			<td align="center">
				<form name="srch" method="post" action="chois.php">
				<img src="img/ins2.jpg" width="350" height="300"/><br>
	         	<input type="submit"  width="300" value="البحث واستعراض الكتب" name="display">
				</form>
			</td>
		</tr>
	</table>
</div>
</body>
</html>