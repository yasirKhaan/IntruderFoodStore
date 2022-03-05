<?php

$servername = "localhost";
$user = "root";
$password = "";
$database ="onlinefood";
$conn = mysqli_connect($servername, $user, $password, $database);

if (!$conn){
	die("Sorry we failed to connect: ".mysqli_connect_error());
}

