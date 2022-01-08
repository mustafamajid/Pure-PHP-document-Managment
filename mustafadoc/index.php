<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> نظام الارشفة</title>
</head>
<body>

	
<?php
	
require('connection.php');
	 if(isset($_POST['subm']))	{
	  echo('submit');
		
error_reporting(-1);
ini_set('display_errors', 'On');
if(isset($_POST['bn']))
	
{
	$bn =$_POST['bn'];
	$bn =mysql_real_escape_string($bn);
}
else
$bn=NULL;
 
	if(isset($_POST['bd'])){
	$bd =$_POST['bd'];
	$bd =mysql_real_escape_string(bd);}
	else{$bd=NULL;}
	

	if(isset($_POST['sub']))
	{
	$sub =$_POST['$sub'];
	$sub =mysql_real_escape_string($sub);
	}
	else
	$sub=NULL;
	
	if(isset($_POST['ffrom']))
	{
	$ffrom =$_POST['ffrom'];
	$ffrom =mysql_real_escape_string($ffrom);
	}
	else
	$ffrom=NULL;
	
	if(isset($_POST['tto']))
	{
	$tto =$_POST['tto'];
	$tto =mysql_real_escape_string($tto);}else
	$tto=NULL;
	
	if(isset($_POST['mins']))
	{
	$mins =$_POST['mins'];
	$mins =mysql_real_escape_string($mins);}
	else
		$mins=NULL;
	
	
	if(isset($_POST['gm']))
	{
	$gm =$_POST['gm'];
	$gm =mysql_real_escape_string($gm);
	}else
		$gm=NULL;
	
	if(isset($_POST['trans_to']))
	{
	$trans_to =$_POST['trans_to'];
	$trans_to =mysql_real_escape_string($trans_to);
	}
	else
		$trans_to=NULL;
	
	if(isset($_POST['act']))
	{
	$act =$_POST['act'];
	$act =mysql_real_escape_string($act);
	}
	else
	$act=NULL;
	
	if(isset($_POST['respons_bd']))
	{
	$respons_bd =$_POST['respons_bd'];
	$respons_bd =mysql_real_escape_string($respons_bd);
	}
	else
	$respons_bd=NULL;
	
	if(isset($_POST['respons_bn'])){
	$respons_bn =$_POST['respons_bn'];
	$respons_bn =mysql_real_escape_string($respons_bn);}
	else
	$respons_bn=NULL;
	
	if(isset($_POST['note']))
	{
	$nots =$_POST['nots'];
	$nots =mysql_real_escape_string($nots);
	}
	else
	$nots=NULL;	
	$pic='c:\pic';
	$modiria='itd';
	
$stmt = $conn->prepare("INSERT INTO `books`(`bn`, `bdate`, `sub`, `ffrom`, `tto`, `trans_to`, `minster`, `gm`, `action`, `respons_bn`, `respons_bd`, `pic`, `modiria`, `nots`)
VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param( $bn , $bd , $sub , $fform , $tto , $trans_to , $mins , $gm , $act , $respons_bn , $respons_bd , $pic  , $modiria , $nots);
	

if($stmt->execute())
	echo( mysqli_error($this->sql));	
$stmt->commit();
	}
?>


<form method="post" action="index.php" id="addform"> 
<table class="tabl">
	
	<tr>
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
		</tr></table>
	<input type="submit" name="sumb"  value="submit" form="addform">
	
	


</form>
	
</form>
</body>
</html>
