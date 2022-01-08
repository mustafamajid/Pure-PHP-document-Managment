
<html>
<head>
<meta charset="utf-8">
<title> نظام الارشفة</title>
<link href="mycss.css"  type="text/css" rel="stylesheet"/>

</head>
<body >
	
<?php
session_start();
if(isset($_SESSION['user']))
{
require('connection.php');	
	$sql = "SELECT `id`, `bn`, `bdate`, `sub`, `ffrom`, `tto`, `trans_to`, `minster`, `gm`, `action`, `respons_bn`, `respons_bd`, `pic`, `modiria`, `nots` FROM `books` WHERE `id`= ".$_GET['id'];
$picupresult =mysqli_query($conn,$sql);
$pic_up_row = mysqli_fetch_assoc( $picupresult ) ;
	echo($pic_up_row['bn']);
	if(isset($_POST['updatesubmit']))	
	{
	echo 'y';
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
	else{$act=NULL;}
	echo $ac.'action<br>d'.$bd;
	
	if(isset($_POST['respons_bd']))
	{
	$respons_bd =$_POST['respons_bd'];
	$respons_bd =mysqli_escape_string($conn,$respons_bd);
	}
	else
	{$respons_bd=NULL;}
	
	if(isset($_POST['respons_bn'])){
	$respons_bn =$_POST['respons_bn'];
	$respons_bn =mysqli_escape_string($conn,$respons_bn);}
	else
	$respons_bn=NULL;
	
	if(isset($_POST['nots']))
	{
	$nots =$_POST['nots'];
	$nots =mysqli_escape_string($conn,$nots);
	}
	else
	$nots=NULL;	
		
	$id=$_GET['id'];
	$pic=''.$id.'_'.$bn;
		if(file_exists($pic_up_row['pic']))
		{echo '<br>renam';
			rename($pic_up_row['pic'],$pic);
		}
		else{
			
			mkdir($pic,0777,true);echo('mkd');
		}
echo('<br>'.$pic.'<br>'.$pic_up_row['pic']);
$stmt = $conn->prepare(" UPDATE books SET bn=?,bdate=?, sub=?, ffrom=?,tto=?, trans_to=?, minster=?, gm=?, action=?, respons_bn=?, respons_bd=?,pic=? ,nots=? where id=?" );
    echo($sub.$_GET['id']);
	$stmt->bind_param( 'sssssssssssssi',$bn , $bd , $sub , $ffrom , $tto , $trans_to , $mins , $gm , $act , $respons_bn , $respons_bd  ,$pic  , $nots,$_GET['id']);
printf( $stmt->error );
if($stmt->execute())
	{
		echo('hi');
		$dir=$pic;
	    unset($_SESSION['addpicdir']);
		$_SESSION['addpicdir']=$dir;
		unset($_SESSION['addbn']);
		$_SESSION['addbn']=$bn;
		unset($_SESSION['addsub']);
        $_SESSION['addsub']=$sub;
		unset($_SESSION['cpage']);
		$_SESSION['cpage']='fileupload';
		unset($_SESSION['frompage']);
		$_SESSION['frompage']='display.php';
		header('location:fileupload.php');
	}
		else{
	     echo(mysqli_stmt_error($stmt));	
  	       }

	}
}
	else
	{
		echo('hr'); 
	    session_destroy();
		header('location:login.php');
	}
	
?>

	

<div align="right" >
<h1 align="center" style="color:#20435F">نظام الارشفة الالكتروني</h1><br>
<table class="tabl" align="right">
	<form method="post" action="edite.php?id=<?php echo($_GET['id']) ;?>" id="addform"  name="addform"> 1	<tr>
		<td><input type="text" class="txt" name="bn"  value="<?php echo($pic_up_row['bn']); ?>">  </td>
		<td><label class="lable"> رقم الكتاب</label></td>
	</tr>
		<tr>
		<td><input type="date" class="dat" name="bd"  value="<?php echo($pic_up_row['bdate']); ?>"></td>
		<td><label class="lable"> تاريخ الكتاب</label></td>
		</tr>

		<tr>
		<td><input type="text" class="txt" name="sub" value="<?php echo($pic_up_row['sub']); ?>"></td>
		<td><label class="lable">عنوان الكتاب </label></td>
		</tr>
		
		<tr>
		<td><input type="text" class="txt" name="ffrom" value="<?php echo($pic_up_row['ffrom']); ?>">  </td>
		<td><label class="lable">الجهة الوارد منها الكتاب</label></td>
		</tr>
		
		<tr>
		<td><input type="text" class="txt" name="tto" value="<?php echo($pic_up_row['tto']); ?>"></td>
		<td><label class="lable"> الجهة المرسل لها الكتاب</label></td>
		</tr>
		
		<tr>
		<td><input type="text" class="txt" name="mins" value="<?php echo($pic_up_row['minster']); ?>">  </td>
		<td><label class="lable"> هامش معالي الوزير</label></td>	
		</tr>
		
		<tr>
		<td><input type="text" class="txt" name="gm" value="<?php echo($pic_up_row['gm']); ?>">  </td>
		<td><label class="lable">هامش المدير العام</label></td>
		</tr>
		
		<tr>
		<td><input type="text" class="txt" name="trans_to" value="<?php echo($pic_up_row['trans_to']); ?>">  </td>
		<td><label class="lable"> الجهة المحول لها الكتاب</label></td>
		</tr>
		
		<tr>
		<td><textarea class="txta" cols="70" rows="3" name="act" ><?php echo($pic_up_row['action']);?></textarea></td>	
		<td><label class="lable"> الاجراء المتخذ</label></td>
		</tr>
		
		<tr>
		<td><input type="text" class="txt" name="respons_bn" value="<?php echo($pic_up_row['respons_bn']);?> " >  </td>
		<td><label class="lable">رقم كتاب الاجابة </label></td>
		</tr>
		<tr>
		<td>
		<input type="date" class="dat" name="respons_bd" value="<?php echo($pic_up_row['respons_bd']);?>" >  </td>
		<td><label class="lable"> تاريخ كتاب الاجابة</label></td>
		</tr>
		<tr><td>
		<textarea class="txta" cols="70" rows="3"  name="nots" value="<?php echo($pic_up_row['nots']);?>"></textarea></td>
		<td><label class="lable">الملاحظات </label></td>
		</tr>
		
<tr><td>
<input type="submit" name="updatesubmit" form="addform"></td></tr></form></table>
	</div>
</body>
</html>

</body>
</html>