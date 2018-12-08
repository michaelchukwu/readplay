<?php
session_start();
$user = $_POST['username'];
$school = $_POST['school'];
$class = $_POST['class1'];
$email = $_POST['email1'];
$password = $_POST['password'];

$con = mysqli_connect('localhost','root','1234','readplay');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,"readplay");
$sql="INSERT INTO users(`username`, `school`, `class`, `email`, `password`) VALUES('$user', '$school','$class','$email', '$password')";
$result = mysqli_query($con,$sql);
if($result){
    $_SESSION['created'] = "User created, Please login";
    header('location:login.php');
}else{
    $_SESSION['created'] = "User not created, there is an error";
    header('location:login.php');
}
?>