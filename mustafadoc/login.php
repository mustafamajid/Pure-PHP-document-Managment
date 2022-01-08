<!doctype html>
<html>
<head>

<meta http-equiv="Content-Language" content="ar-sa">
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
 
<title>الدخول للنظام</title>
</head> 

<body  style="background-image: url(img/slide-docsolutions-bg.jpg);
background-repeat:no-repeat;
background-position:center;">
<?php
	session_start();
	session_destroy();
	session_start();
	require('connection.php');
	 if(isset($_POST['logbtn']))	
	 {
		
		 $userr=$_POST['user'];
		
		 $sql = "SELECT * from passwords where `id`='$userr'";
         $result =mysqli_query($conn,$sql);
		 $row=mysqli_fetch_assoc( $result );
		 $dbpass=$row['pass'];
		 $usr=$row['user'];
		echo($row['user']);
		 $pass=$_POST['pass'];	
		 if($dbpass==$pass)
		 {
			 $_SESSION['user']=$usr;
			 $_SESSION['cpage']='chois';
		header('location: chois.php');	 
		 }		 
	else echo $pass ;	 
	 }
	include('master.php');
	?>
<br>
<div align="center" >
	<form method="post" style="border: thick;background-color: rgba(0, 0, 0, 0.5);border-radius: 10px; padding: 20px;">
	<table><tr><td align="right">
		<select name="user"  style=" font-weight: 800; font-size:26pt ;width: 300px;border-radius: 10px" ><option> </option>
		
<?php
		$sql = "SELECT * from passwords";
 $result =mysqli_query($conn,$sql);

          while( $row = mysqli_fetch_assoc( $result ) )
		  {
	      echo("<option value='{$row['id']}'>{$row['user']}</option>");
			  
		  }
		?></select>
		
		</td><td><label  style=" font-weight: 800; font-size:26pt ">اختر المديرية</label></td></tr>
		<tr>
			<td><input type="password" name="pass" style="  font-size:26pt; border-radius: 10px; " required></td><td><label  style=" font-weight: 800; font-size:26pt ;">كلمة المرور </label></td>
			
		</tr>
		<tr align="center"><td colspan="2" align="center">	
		<input type="submit" value="دخول" width="90px" name="logbtn" style="width:100 ;font-size: 32px;border-radius: 10px;padding: 10px; "/></td></tr>
		</table>
		
	</form>
</div>
</body>
</html>