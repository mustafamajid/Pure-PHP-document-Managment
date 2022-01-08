<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	echo($_GET['path']);
	$path=$_GET['path'];
	$path=str_replace('_','/',$path);
	echo('<br>'.$path);
	if (isset($_FILES['file']))
	{
		
	$tempfile=$_FILES['file']['tmp_name'];
	$filename = $_FILES['file']['name'];
	
		
	
		if(! file_exists($path));
	{
	    mkdir($path,0777,true);
    }
	    $filecounter=1;
	    $newfilename=$path.'/'.$filename;
		
		while(file_exists ($newfilename))
		{	
	     $filecounter=$filecounter+1;
         $newfilename=$path.'/'.$filecounter.'_'.$filename;
		}
     	move_uploaded_file($tempfile,$newfilename);	
	}
	?>
	<form action="f.php"  method="post">
<input type="file" name="file" id ="file"><input type="submit"></form>
</body>
</html>