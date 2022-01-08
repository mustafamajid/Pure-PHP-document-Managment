<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	require('connection.php');
	$r=$conn->query("SELECT * FROM `gn` WHERE 1 FOR UPDATE");
	$row = $r->fetch_assoc();
	echo($row['idg']);
	 $id= $row['idg'];
    $id=$id+1;
		 $r=$conn->query("update  `gn` set idg=$id WHERE 1");
		  $r=$conn->query("commit");
	?>
</body>
</html>