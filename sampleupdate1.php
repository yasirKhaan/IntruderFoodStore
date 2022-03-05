<?php
include_once 'examdatabase.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE product set product_id='" . $_POST['product_id'] . "', product_name='" . $_POST['product_name'] . "', product_price='" . $_POST['product_price'] . "',product_detail='" . $_POST['product_detail'] . "' WHERE product_id='" . $_POST['product_id'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM product WHERE product_id='" . $_GET['product_id'] . "'");
$row= mysqli_fetch_array($result);


?>



<html>
<head>
<title>Update product Data</title>
<style type="text/css">
	body{
		background-color: #1E90FF;
	}
	.updateform{
		background-color: #191970;
		width: 380;
		padding: 10px;
		margin-left: 500px;
		margin-top: 180px;
		height: 350px;
	}
	.updateform2{
		margin-left: 100px;
	}

.navbar{
	display: flex;
	align-items: center;
	padding:20px;
	background-color: #191970;
	margin: 0px;
	margin-top: -44px;
	margin-right: -10px;
	margin-left: -10px; 
}
nav {
	flex: 1; /*flex property sets the flexible length on flexible items*/
	text-align: right;
}
nav{
	text-align: right;
}
nav ul{
	display: inline-block;
	list-style-type: none;
}
nav ul li {
	display: inline-block;
	margin-right: 20px;
}
.navfont{
	color: #E6E6FA;
}
</style>
</head>
<body>

	<div class="navbar">
				<div class="logo">
			<a href=""><img src="LOGO IC.png" width="125px"></a>
		</div>
		<nav>
			<ul id="MenuItems">
				<li><a href="adminhome.html"><font class="navfont">Home</font></a></li>
				<li><a href=""><font class="navfont">Fast Foods</font></a></li>
				<li><a href="logout.php"><font class="navfont">Logout</font></a></li>
			</ul>
		</nav>
	</div>
	
<form name="frmUser" method="post" action="">
<div>
	<?php if(isset($message)) { 
	
	echo "<script>alert('UPDATED SUCCESFULL!')</script>";
	echo "<script>window.open('adminalldata.php', '_self')</script>";
	} 
	?>
</div>
<div class="updateform">
	<div class="updateform2">
	<form>
		<h1><font color="#E6E6FA">Update Products</font></h1>
<font color="#E6E6FA">product id:</font> <br>
<input type="hidden" name="product_id" class="txtField" value="<?php echo $row['product_id']; ?>">
<input type="text" name="product_id"  value="<?php echo $row['product_id']; ?>">
<br><br>
<font color="#E6E6FA">product name: </font><br>
<input type="text" name="product_name"  value="<?php echo $row['product_name']; ?>">
<br><br>
<font color="#E6E6FA">product price :</font><br>
<input type="number" name="product_price"  value="<?php echo $row['product_price']; ?>">
<br><br>

<font color="#E6E6FA">product detail:</font><br>
<input type="text" name="product_detail"  value="<?php echo $row['product_detail']; ?>">
<br><br>
<input type="submit" name="submit" value="Submit" class="buttom">
</form>
</div>
</div>
</form>
</body>
</html>
