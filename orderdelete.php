<?php 
include_once 'examdatabase.php'; 
$sql = "DELETE FROM foodorder WHERE orderid='" . $_GET["orderid"] . "'"; 
if (mysqli_query($conn, $sql)) { 
	echo "<script>alert('ORDER DELETE !')</script>";
	echo "<script>window.open('adminorder.php', '_self')</script>";
} else { 
	echo "Error deleting record: " . mysqli_error($conn); 
} 
?>