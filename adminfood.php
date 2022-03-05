<?php

include("examdatabase.php");
session_start();

if (isset($_POST['btn1'])) {

// receive all input values from the form

$pname = mysqli_real_escape_string($conn,$_POST['t1']);

$price = mysqli_real_escape_string($conn,$_POST['t2']);

$pdetail = mysqli_real_escape_string($conn,$_POST['t3']);

$pcode = mysqli_real_escape_string($conn,$_POST['t4']);


// Check connection

if ($conn->connect_error) {

die("Connection failed: " . $conn->connect_error);

}
$name = $_FILES['file']['name'];
$target_dir = "C:/xampp/htdocs/weblabexam/khurram/adminpicture/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
 // Select file type
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
$extensions_arr = array("jpg","jpeg","png","gif");

if( in_array($imageFileType,$extensions_arr) ){
	
	$sql = "INSERT INTO product (product_name,product_price,product_code,product_image,product_detail)

	VALUES ('$pname', $price, '$pcode', '".$name."','$pdetail')";
	
	move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
}

if ($conn->query($sql) === TRUE) {

echo "<script>alert('PRODUCT ADDED !')</script>";


} else {

echo "Error: " . $sql . "<br>" . $conn->error;

}

}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>ADMINFASTFOOD</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: #1E90FF;
}
#MenuItems{
	list-style-type: none;
}
.navbar{
	display: flex;
	align-items: center;
	padding:20px;
}
nav {
	flex: 1; /*flex property sets the flexible length on flexible items*/
	text-align: right;
}
.navbar{
	display: flex;
	align-items: center;
	padding:20px;
	background-color: #191970;
	margin-top: -24px;
	margin-right: -10px;
	margin-left: -10px; 
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
.prodform{
	width: 100%;
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	align-items: center;
}
.fontcol{
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
				<li><a href="adminalldata.php"><font class="navfont">Fast Foods</font></a></li>
				<li><a href="logout.php"><font class="navfont">Logout</font></a></li>
			</ul>
		</nav>
	</div>
<div class="prodform">	

<form method="post" action="" enctype='multipart/form-data'>
<h1 align="center" class="fontcol">Add Product</h1>
<font class="fontcol">PRODUCT NAME</font> <input type="text" name="t1"><br><br>
<font class="fontcol">PRODUCT PRICE</font> <input type="number" name="t2"><br><br>
<font class="fontcol">PRODUCT DETAIL</font> <input type="text" name="t3"><br><br>
<font class="fontcol">PRODUCT CODE</font> <input type="text" name="t4"><br><br>
<font class="fontcol">PRODUCT IMAGE</font> <input type='file' name='file'><br><br>
<input type="submit" name="btn1">
</div>

</form>
</body>
</html>
