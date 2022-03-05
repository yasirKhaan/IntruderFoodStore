<?php 
include_once 'examdatabase.php'; 
$sql = "DELETE FROM product WHERE product_id='" . $_GET["product_id"] . "'"; 
if (mysqli_query($conn, $sql)) { 
	echo "<script>alert('PRODUCT DELETE !')</script>";
	echo "<script>window.open('adminalldata.php', '_self')</script>";
} else { 
	echo "Error deleting record: " . mysqli_error($conn); 
} 
?>