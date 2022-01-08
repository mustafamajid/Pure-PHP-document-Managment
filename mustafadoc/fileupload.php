<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta content="ar-sy" http-equiv="Content-Language" />
<title>Untitled Document</title>
</head>
<body bgcolor="##DDCFCF">
<?php
	session_start();
if (isset($_POST['finsh']))
{
	 echo '<script language="javascript">';
       echo 'alert(" تم تجاهل اضافة الصور")';
       echo '</script>';
	   $frompage = $_SESSION['frompage'];
	    unset($_SESSION['frompage']);
		$_SESSION['frompage']='fileupload.php';
          unset($_SESSION['cpage']);
		$_SESSION['cpage']=substr($frompage,0,strpos($frompage,'.'));
		
		header('location:'.$frompage);
	
}
	if(($_SESSION['cpage']=='fileupload') && (isset($_POST['filesubmit'])))
	{
	
		for($i=0;$i<count($_FILES['Filedata']['name']);$i++)
	{

	$fileTypes = array('.jpg','.jpeg','.gif','.png','.doc','.docx','.xls','.pdf'); // File extensions
	$filename = $_FILES['Filedata']['name'][$i];
	$ext=substr($filename,strpos($filename,'.'),strlen($filename)-strpos($filename,'.'));
	$tempfile=$_FILES['Filedata']['tmp_name'][$i];
		$filecounter=$i;
		$newfilename=$_SESSION['addpicdir'].'/'.$filecounter.$ext;
		while(file_exists ($newfilename))
		{$filecounter=$filecounter+1;
		$newfilename=$_SESSION['addpicdir'].'/'.$filecounter.$ext;
		}
		
	if (in_array($ext,$fileTypes)) {
		echo($newfilename.'-'.$tempfile.'<br>');
		move_uploaded_file($tempfile,$newfilename);	
	} else {
	    echo($newfilename.'-'.$tempfile.'<br>');
		echo $ext.'Invalid file type.';
        echo '<script language="javascript">';
        echo 'alert("لم تتم الاضافة بنجاح")';
        echo '</script>';
		goto a;
	}}
	   echo '<script language="javascript">';
       echo 'alert("تمت الاضافة بنجاح ")';
       echo '</script>';
	   $frompage = $_SESSION['frompage'];
	    unset($_SESSION['frompage']);
		$_SESSION['frompage']='fileupload.php';
          unset($_SESSION['cpage']);
		$_SESSION['cpage']=substr($frompage,0,strpos($frompage,'.'));
		echo '<br>'.$frompage.'<br>'.$_SESSION['cpage'];
		header('location:'.$frompage);
	}
	a:
	
	?>

<div style="  margin:0 auto; width:700px">

<table style="border:1px  ;border-color:#1E0C0C; border-width:10px ; background-color:#B8D6F5;padding: 25px; border-radius: 12px;margin: auto">
<form action="fileupload.php" method="post"  enctype="multipart/form-data" id="upld" >
<tr style="border: 1px;padding: 10px;padding-bottom: 30px">
<td height="135" colspan="2" align="center" style="border: 1">
<label style="font-size:36px; font-weight:700;">
انت الان بصدد اضافة صور الوثائق الخاصة بالكتاب الذي يحمل التفاصيل التالية

</label><br><br><br></td>
</tr>
<tr  align="right" style="background-color:#5C6970;">
<td width="473" height="68">
<label style="font-size:34px; font-weight:600;border: 1px ">
<?php
	
echo($_SESSION['addbn']);	
?>
	
</label>
</td>
<td width="197" >
<label style="font-size:34px; font-weight:600;border: 1px ">رقم الكتاب</label><br>
</td>
</tr>
<tr align="right"style="background-color:#5C6970">
<td height="66" >
<label style="font-size:34px; font-weight:600;border: 1px;  ">
<?php	
echo($_SESSION['addsub']);	
?>
</label>
</td>
<td>
<label style="font-size:36px; font-weight:700">عنوان الكتاب</label>
</td>
</tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
<tr align="center"  style=" padding:100px;" ><td colspan="2">
<input type="button" id="loadFileXml" value="انقر هنا لختيار الصور" onclick="document.getElementById('fileup').click();" />
<input type="file" name="Filedata[]" multiple align="center" form="upld" accept=".jpg,.jpeg,.doc,.docx,.xls" value="اختار ملفات الصور" data-buttonText="Your label here" style="display:none;" id="fileup">
</td></tr>
<tr align="center"><td colspan="2">--------------------------------------------</td></tr>
<tr align="center"><td colspan="2"><input type="submit" name="filesubmit" form="upld" value="رفع الصور التي تم اختيارها"></td></tr>
</form>
<tr align="center"><td colspan="2">--------------------------------------------</td></tr>
<tr align="center"><td colspan="2">--------------------------------------------</td></tr>
<tr align="center"><td colspan="2"><form action="fileupload.php" method="post"><input type="submit" value="الغاء الاضافة" name="finsh"  ></form></td></tr>
</table>
</div>
</body>
</html>