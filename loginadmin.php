<?php

session_start();
include('examdatabase.php');


	
if(isset($_POST['btn1'])){
	$email= $_POST['t1'];
	$pass=$_POST['t2'];
	}


if(empty($email)){

	$error="please correct email";
	}
	else if(empty($pass)){
	$error="please correct password";
	}

else{
	
	$query="select * from adminlogin where email='$email' and password='$pass'";
	$sql=mysqli_query($conn,$query);
	$reslt = mysqli_num_rows($sql);
	$rec = mysqli_fetch_assoc($sql);
	
	if($reslt > 0)
	{
		$_SESSION["Users"] = $rec["email"];
		header('Location: adminhome.html');
		/*session_destroy();*/
	
	}
	else
	{
		$error="incorrect email and password";
	}
}

?>


<html>
<head>
<title>Admin Login Section</title>
<style type="text/css">
	body{
		background-color: #1E90FF;
	}
	.form{
		background-color: #191970;
		width: 340;
		padding: 10px;
		display: flex;
		margin-left: 500px;
		margin-top: 230px;
		height: 220px;
	}
	.form img{
		margin-left: 60px;
	}
</style>
</head>
<body>

<h1><?php if(isset($error)){
	echo $error;
	} ?></h1>
<div class="form">
	
<form action="" method="post"  class="fontcol">
<img src="LOGO IC.png"><br><br>
<font color="#E6E6FA">ADMIN EMAIL </font><input type="email" name="t1"><br /><br />
<font color="#E6E6FA">ADMIN PASSWORD </font><input type="password" name="t2"><br /><br />
<input type="submit" name="btn1">
</div>

</form>
</body>
</html>

















