
<html>
<head>
<meta charset="utf-8">
<title> نظام الارشفة</title>
<link href="mycss.css"  type="text/css" rel="stylesheet"/>

</head>
<body >
	
<?php
session_start();
if($_SESSION['cpage']==='adding'&&isset($_SESSION['user']))
{
require('connection.php');
	 if(isset($_POST['subm']))	{
	 
	
if(isset($_POST['bn']))
	
{
	$bn =$_POST['bn'];
	$bn =mysqli_escape_string($conn,$bn);
}
else
$bn=NULL;
 
	if(isset($_POST['bd'])){
	$bd =$_POST['bd'];
	$bd = mysqli_escape_string($conn,$bd);}
	else{$bd=NULL;}
	

	if(isset($_POST['sub']))
	{
	$sub =$_POST['sub'];
	$sub =mysqli_escape_string($conn,$sub);
	}
	else
	$sub=NULL;
	
	if(isset($_POST['ffrom']))
	{
	$ffrom =$_POST['ffrom'];
	$ffrom =mysqli_escape_string($conn,$ffrom);
	}
	else
	$ffrom=NULL;
	
	if(isset($_POST['tto']))
	{
	$tto =$_POST['tto'];
	$tto =mysqli_escape_string($conn,$tto);}else
	$tto=NULL;
	
	if(isset($_POST['mins']))
	{
	$mins =$_POST['mins'];
	$mins =mysqli_escape_string($conn,$mins);}
	else
		$mins=NULL;
	
	
	if(isset($_POST['gm']))
	{
	$gm =$_POST['gm'];
	$gm = mysqli_escape_string($conn,$gm);
	}else
		$gm=NULL;
	
	if(isset($_POST['trans_to']))
	{
	$trans_to =$_POST['trans_to'];
	$trans_to =mysqli_escape_string($conn,$trans_to);
	}
	else
		$trans_to=NULL;
	
	if(isset($_POST['act']))
	{
	$act =$_POST['act'];
	$act =mysqli_escape_string($conn,$act);
	}
	else
	$act=NULL;
	
	if(isset($_POST['respons_bd']))
	{
	$respons_bd =$_POST['respons_bd'];
	$respons_bd =mysqli_escape_string($conn,$respons_bd);
	}
	else
	$respons_bd=NULL;
	
	if(isset($_POST['respons_bn'])){
	$respons_bn =$_POST['respons_bn'];
	$respons_bn =mysqli_escape_string($conn,$respons_bn);}
	else
	$respons_bn=NULL;
	
	if(isset($_POST['note']))
	{
	$nots =$_POST['nots'];
	$nots =mysqli_escape_string($conn,$nots);
	}
	else
	$nots=NULL;	
		 
	$r=$conn->query("SELECT * FROM `gn` WHERE 1 FOR UPDATE");
	$row = $r->fetch_assoc();
	
    $id= $row['idg'];
	
	
         $id=$id+1;
		 $r=$conn->query("update  `gn` set idg=$id WHERE 1");
		 $r=$conn->query("commit");
		 
	$pic=$id.'_'.$bn;
	$modiria=$_SESSION['user'];
	  
 
		 
    $stmt = $conn->prepare("INSERT INTO `books`(`id`,`bn`,   `bdate`, `sub`, `ffrom`,     `tto`, `trans_to`, `minster`, `gm`, `action`, `respons_bn`, `respons_bd`, `pic`,      `modiria`, `nots`)
     VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
     $stmt->bind_param( 'issssssssssssss',$id,$bn , $bd , $sub , $fform , $tto , $trans_to , $mins , $gm , $act , $respons_bn , $respons_bd , $pic  , $modiria , $nots);
		 
    if($stmt->execute())
	{
		$dir='D:/pic/'.$pic;
		mkdir($dir,0777,true);
	    mysqli_query($conn,"update `books` set `pic`=$pic where `id=$id");
	    unset($_SESSION['addpicdir']);
		$_SESSION['addpicdir']=$dir;
		unset($_SESSION['addbn']);
		$_SESSION['addbn']=$bn;
		unset($_SESSION['addsub']);
        $_SESSION['addsub']=$sub;
		unset($_SESSION['cpage']);
		$_SESSION['cpage']='fileupload';
		unset($_SESSION['frompage']);
		$_SESSION['frompage']='adding.php';
		header('location:fileupload.php');
	}
		else
	echo(mysqli_stmt_error($stmt));	
	}

	}
	else{
	session_destroy();
		header('location:login.php');
	}
	
?>

	

<div align="right" >
<h1 align="center" style="color:#20435F">نظام الارشفة الالكتروني</h1><br>
<table class="tabl" align="right">
	<form method="post" action="adding.php" id="addform" > 1	<tr>
	
		<td><input type="text" class="txt" name="bn" >  </td>
		<td><label class="lable"> رقم الكتاب</label></td>
	</tr>
		<tr>
		<td><input type="date" class="dat" name="bd" >  </td>
		<td><label class="lable"> تاريخ الكتاب</label></td>
		</tr>

		<tr>
		<td><input type="text" class="txt" name="sub">  </td>
		<td><label class="lable">عنوان الكتاب </label></td>
		</tr>
		
		<tr>
		<td><input type="text" class="txt" name="ffrom">  </td>
		<td><label class="lable">الجهة الوارد منها الكتاب</label></td>
		</tr>
		
		<tr>
		<td><input type="text" class="txt" name="tto">  </td>
		<td><label class="lable"> الجهة المرسل لها الكتاب</label></td>
		</tr>
		
		<tr>
		<td><input type="text" class="txt" name="mins">  </td>
		<td><label class="lable"> هامش معالي الوزير</label></td>	
		</tr>
		
		<tr>
		<td><input type="text" class="txt" name="gm">  </td>
		<td><label class="lable">هامش المدير العام</label></td>
		</tr>
		
		<tr>
		<td><input type="text" class="txt" name="trans_to">  </td>
		<td><label class="lable"> الجهة المحول لها الكتاب</label></td>
		</tr>
		
		<tr>
		<td><textarea class="txta" cols="70" rows="3" name="act"></textarea></td>	
		<td><label class="lable"> الاجراء المتخذ</label></td>
		</tr>
			<tr>
		<td><input type="text" class="txt" name="respons_bn">  </td>
		<td><label class="lable">رقم كتاب الاجابة </label></td>
		</tr>
			<tr>
		<td><input type="date" class="dat" name="respons_bd">  </td>
		<td><label class="lable"> تاريخ كتاب الاجابة</label></td>
		</tr>
		
		<tr><td>
		<textarea class="txta" cols="70" rows="3"  name="nots"></textarea></td>
		<td><label class="lable">الملاحظات </label></td>
		</tr>
		
<tr><td>
<input type="submit" name="subm"></td></tr></form></table>

	
	</div>
</body>
</html>

</body>
</html>