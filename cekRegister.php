<?php
include('./config/koneksi.php');
$username = $_POST['username'];
$password = $_POST['password'];

$sql= "INSERT INTO `user` ( `username`, `password`) VALUES ( '".$username."', '".$password."')";
if ($connection->query($sql) === TRUE) {
	header('Location:login.php');
  } else {
	echo "Error: " . $sql . "<br>" . $connection->error;
  }
  
  $connection->close();
