<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	$tempfile=$_FILES['file']['tmp_name'];
	$filename = $_FILES['file']['name'];
	$path=$_GET['path'];
	$path=str_replace($path,'_','/');
	if(! file_exists($path));
	{
	    mkdir($path);
    }
	    $filecounter=1;
	    $newfilename=$path.'/'.$filename;
		while(file_exists ($newfilename))
		{	
	     $filecounter=$filecounter+1;
         $newfilename=$path.'/'.$filecounter.'_'.$filename;
		}
     	move_uploaded_file($tempfile,$newfilename);	
	?>
<input type="file" name="file">
</body>
</html>