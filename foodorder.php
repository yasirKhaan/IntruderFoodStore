<?php

include("examdatabase.php");
session_start();

if (isset($_POST['btn1'])) {

// receive all input values from the form

$uname = mysqli_real_escape_string($conn,$_POST['t1']);

$phone = mysqli_real_escape_string($conn,$_POST['t2']);

$uaddress = mysqli_real_escape_string($conn,$_POST['t3']);

$upayment = mysqli_real_escape_string($conn,$_POST['t5']);

// Check connection

if ($conn->connect_error) {

die("Connection failed: " . $conn->connect_error);

}


	
$sql = "INSERT INTO foodorder (username,phone,address,payment)

VALUES ('$uname', '$phone', '$uaddress', '$upayment')";

if ($conn->query($sql) === TRUE) {

echo "<script>alert('ORDER PLACED!')</script>";


} else {

echo "Error: " . $sql . "<br>" . $conn->error;

}

}

$conn->close();

?>





<html>
<head>
<title>ORDER PLACING</title>
<style type="text/css">
	body{
    background-color: #1E90FF;
}
    #MenuItems{
        list-style-type: none;
    }
    .header{
    background-color: #191970;
        margin-top: -10px;
        height: 70px;
        margin-right: -10px;
        margin-left: -8px;
    }
    .navbar{
        display: flex;
        align-items: center;
    }
    nav {
    flex: 1; /*flex property sets the flexible length on flexible items*/
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
        color: white;
        font-family: Century Gothic;
    }
    .container {
    width:100%;
    margin:0 auto;
    position:relative;
    }
    .footer-col-2,{
    min-width: 250px;
    margin-bottom: 20px;
    }
    .footer-col-2 img{
    width: 180px;
    margin-bottom: 20px;
    margin-left: 650px;
    }
    .footer{
    background-color: #191970;
    color: #8a8a8a;
    font-size: 14px;
    padding: 60px 0 20px;
    margin-left: -9px;
    margin-right: -9px;
    margin-bottom: -9px;
    }
    .footer p{
        color: #8a8a8a;
        margin-left: 90px;
        text-align: center;
    }
    .footer hr{
    border: none;
    background: #b5b5b5;
    height: 1px;
    margin: 20px 0;
}
.about{
	text-align: center;
	font-family: Century Gothic;
    margin: 150px;
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
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
            <a href="home.html" style="margin-left: 5px;"><img src="LOGO IC.png" width="130px"></a>
                </div>
                <nav>
    				<ul id="MenuItems">
    					<li><a href="home.html"><font color="white">HOME</font></a></li>
    					<li><a href="index.php"><font color="white">FAST FOOD/CART</font></a></li>
    					<li><a href="about.html"><font color="white">ABOUT US</font></a></li>
    					<li><a href="contact.html"><font color="white">CONTACT US</font></a></li>
    				</ul>
                </nav>
            </div>
        </div>
    </div>

<div class="prodform">	

<form method="post" action="" enctype='multipart/form-data'>
<h1 align="center" class="fontcol">ORDER PLACED!</h1>
<font class="fontcol">CUSTOMER NAME</font> <input type="text" name="t1"><br><br>
<font class="fontcol">PHONE #</font> <input type="text" name="t2"><br><br>
<font class="fontcol">ADDRESS</font> <input type="text" name="t3"><br><br>
<label for="payment">CHOOSE A PAYMENT:</label>
<select name="t5" id="method">
  <option value="cash">CASH ON DELIVERY</option>
  <option value="card">THROUGH CARD</option>
</select>
<input type="submit" name="btn1">
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="footer">
            <div class="footer-col-2">
                <img src="LOGO IC.png">
                <p style="font-size: 15px;">Our Motive Is To Provide Fresh And HomeMade Food To Your Door Steps</p>   
        <hr>
    </div>
</div>
	
</body>

</html>