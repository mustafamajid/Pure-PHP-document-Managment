<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta content="ar-sy" http-equiv="Content-Language" />
<title>Untitled Document</title>
<link href="displaycss.css"  type="text/css" rel="stylesheet"/>
</head>
<body >
<?php
require('connection.php');
session_start();

if(isset($_POST['chois']))
{
	  
	
		unset($_SESSION['cpage']);
		$_SESSION['cpage']='chois';
		unset($_SESSION['frompage']);
		$_SESSION['frompage']='display.php';
	    header('location:chois.php');
}

if(isset($_SESSION['pagenumber']))
   {
	if(isset($_POST['prv']))
	{if($_SESSION['pagenumber']>=1){$_SESSION['pagenumber']-=1;}}
		if(isset($_POST['nextpage']))
	{$_SESSION['pagenumber']+=1;}
		if(isset($_POST['gotopage']))
	{if(isset($_POST['pagetext'])){$_SESSION['pagenumber']=intval($_POST['pagetext']);}else $_SESSION['pagenumber']=0; }   
}
	else{
		$_SESSION['pagenumber']=0;
	}
	$pagenumber= $_SESSION['pagenumber'];
	$pagenumber=$pagenumber * 10;
		$wherestr='';

if (isset($_SESSION["user"]))
{
if(isset($_POST['search']))
{
	if(isset($_POST['bn'])&& $_POST['bn']!='')
	{  
	    $bn=$_POST['bn'];
		$wherestr= $wherestr." AND `bn` LIKE '%".$bn."%'";	echo $bn.'<br>';
	}
	
		if(isset($_POST['sub'])&& $_POST['sub']!='')
	{   echo'here<br>';
	    $sub=$_POST['sub'];
		$wherestr= $wherestr." AND `sub` LIKE '%".$sub."%' ";
	}
		
		if(isset($_POST['ffrom'])&& $_POST['ffrom']!='')
	{   
	    $ffrom=$_POST['ffrom'];
		$wherestr= $wherestr." AND `ffrom` LIKE '%".$ffrom."%' ";
	}
		if(isset($_POST['bdate'])&& $_POST['bdate']!='')
	{   
	    $bdate=$_POST['bdate'];
		$wherestr= $wherestr." AND `bdate` = '".$bdate."' ";
	}
	$pagenumber =0;
}


$sql = "SELECT `id`, `bn`,`sub`,`ffrom`,`bdate`,`pic` from `books` where 1 ".$wherestr." ORDER BY `id` DESC limit {$pagenumber},10 ";

$result =mysqli_query($conn,$sql);

      
     
?>

<div class="tablediv">
    
 <table>
 <thead>
		<tr><td colspan="5" style="border:groove; font-size:16px; font-weight:600">
        <h3 align="center" style="color:#CCC; background-color:#333">البـــــــــــــــــــــــــحث</h3><br>
         <form  action="display.php" method="POST" id="srch" accept-charset="utf-8" >
     
     <input type="text" placeholder="بحث عن رقم الكتاب" name="bn" style=" margin-right:15px; margin-left:100px;font-size:16px; font-weight:600;" id="bn" form="srch" > 
     
     <input type="text" name="sub" placeholder="بحث عن عنوان الكتاب" form="srch" id="sub" style=" margin-right:15px;font-size:16px; font-weight:600;">
     
     <br><br>
     
     <input type="text" name="ffrom" placeholder="بحث عن الجهة ارسال الكتاب"  id="ffom" form="srch" style="margin-right:15px; margin-left:100px;font-size:16px; font-weight:600;">
     
     <input type="date" name="bdate" form="srch" placeholder="بالحث عن تاريخ"  id="bdate" style="margin-right:15px; width:170px;font-size:16px; font-weight:600;">
     
     <input type="submit" name="search" form="srch" value="ابحث" width="100px" style="font-size:16px;font-size:16px; font-weight:600;" >
     
     </form>
        
          </td></tr>
            <tr>
            <th>رقم الكتاب</th>
            <th>عنوان الكتاب</th>
            <th>الجهة الوارد منها الكتاب</th>
            <th>تاريخ الكتاب</th>
            <th>العمليات</th>
    </tr>
    </thead>
    <tbody>
        <!--Use a while loop to make a table row for every DB row-->
        <?php while( $row = mysqli_fetch_assoc( $result )) { 
       echo ("<tr> <td>{$row['bn']} </td> <td>{$row['sub']}</td> <td>{$row['ffrom']}</td><td>{$row['bdate']}</td><td><a href={$row['pic']}> الصور </a><a href=edite.php?id={$row['id']}> تعديل </a></td></tr>");
	 } ?>
   <tr><td colspan="5"><form id="paging" method="POST"><table><tr><td><input name="prv" type="submit" value="الانتقال للصفحة السابقة"  style="font-size:16px; font-weight:600;"></td><td><input type="text" name="pagetext" onkeypress="return isNumberKey(event)" width="30px"  style="font-size:16px; font-weight:600;"><input name="gotopage" type="submit" value="الانتقال لرقم الصفحة"  style="font-size:16px; font-weight:600;"><td><input type="submit" name="nextpage" value="الانتقال للصفحة التالية"  style="font-size:16px; font-weight:600;"></td></td></tr><tr  align="center">
   <td colspan="3" align="center" ><input type="submit" name="chois" value="الذهاب الى القائمة الرئيسية"  style="font-size:16px; font-weight:600; "></td></tr>
   </table>
</form></td></tr>
</tbody>
</table>
	

	
<?php } ?>
	</div>
</body>
</html>