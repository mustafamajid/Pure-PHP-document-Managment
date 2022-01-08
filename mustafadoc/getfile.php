<?php
$l= scandir($_GET['dir']);

foreach($l as $v)
{
	if (strpos($v, 'jpg') !== false  or strpos($v, 'jpeg') !== false)
	{
		echo($v.'|');
	}
}



?>