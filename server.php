<?php

	$name="";
	$address="";
	$id=0;
	$edit_state=false;
 //database connection
 $db = mysqli_connect('localhost','root','','php_crud');


 if(isset($_POST['save']))
 {
 	//alert(1);
 	$name=$_POST['name'];
 	$address=$_POST['address'];

 	$query = "INSERT INTO info (name,address) values ('$name','$address')";
 	mysqli_query($db, $query);
 	header('location:index.php');
 }

//update records
 if(isset($_POST['update']))
 {
 	$name = mysqli_real_escape_string($db,$_POST['name']);
 	$address = mysqli_real_escape_string($db,$_POST['address']);
 	$id = mysqli_real_escape_string($db,$_POST['id']); 

 	mysqli_query($db,"update info set name ='$name', address = '$address' where id=$id");

 	header('location:index.php');
 }

//delete records
 if(isset($_GET['del']))
 {
 	$id=$_GET['del'];
 	mysqli_query($db,"delete from info where id=$id");
 	header('location:index.php');
 }


 //retrive record

 $results = mysqli_query($db,"select * from info");
?>