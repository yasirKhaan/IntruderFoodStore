<?php 
include_once 'examdatabase.php'; 
$result = mysqli_query($conn,"SELECT * FROM foodorder"); 
?>

<!DOCTYPE html> 
<html> 
<head> 
<title> ALL ORDER DATA </title> 
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css">
	<link rel="stylesheet" type="text/javascript" href="bootstrap/bootstrap.js">
	<style type="text/css">
	*{
		padding: 0px 5px;
	}
		body{
  background-color: #1E90FF;
}
		}
		.tablefont{
			color: #F08080;
		}
		.head{
			color: white;	
		}
		.font{
			color: pink;
		}
		#MenuItems{
	list-style-type: none;
}
.navbar{
	display: flex;
	align-items: center;
	padding:20px;
	background-color: #191970;
	margin: 0px;
	margin-top: -24px;
	margin-right: -10px;
	margin-left: -10px; 
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
.btn{
		display: inline-block;
	background: white;
	color:black;
	padding: 8px 30px;
	margin: 30px 0;
	border-radius: 20px;
	font-family: Century Gothic;
	transition: background 0.5s;
	</style>
}

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
	<h1 class="head" align="center">ALL ORDER DATA</h1>

	
<table class="table"> 
<tr >
	<td><font class="tablefont">ORDER ID</font></td>
	<td><font class="tablefont">CUSTOMER Name</font></td>
	<td><font class="tablefont">CUSTOMER PHONE #</font></td> 
	<td><font class="tablefont">CUSTOMER ADDRESS</font></td>
	<td><font class="tablefont">PAYMENT METHOD</font></td>
	<td colspan="2" align="center"><font class="tablefont">Action</font></td>
	</tr> 
	<?php 
	$i=0; 
	while($row = mysqli_fetch_array($result)) { 
	if($i%2==0)
		$classname="even";
	else
		$classname="odd";

	
	?> 
	<tr class="<?php if(isset($classname)) echo $classname;?>">
	<td><font class="font"><?php echo $row["orderid"]; ?></font></td>
	<td><font class="font"><?php echo $row["username"]; ?></font></td> 
	<td><font class="font"><?php echo $row["phone"]; ?></font></td> 
	<td><font class="font"><?php echo $row["address"]; ?></font></td>
	<td><font class="font"><?php echo $row["payment"]; ?></font></td>
	<td><a href="orderdelete.php?orderid=<?php echo
$row["orderid"]; ?>"><font class="font">Delete</font></a></td>
	
	</tr> 
	<?php 
	$i++; 
	} 
	?> 
</table> 
</body> 
</html>
