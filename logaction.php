<?php
session_start();
$user = $_POST['username'];
$password = $_POST['password'];

$con = mysqli_connect('localhost','root','','readplay');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,"readplay");
$sql="SELECT * FROM users WHERE `username` = '$user' AND `password` = '$password'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
    if($result){
        $_SESSION['created'] = "Login successful";
        $_SESSION['id'] = $row['id'];
        $id = $row['id'];
        $_SESSION['user'] = $user;
        $sql="INSERT INTO game(`user_id`, `score`) VALUES($id, 0)";
        $result = mysqli_query($con,$sql);
        if($result){
            $_SESSION['game'] = mysqli_insert_id($con);
        }
        header('location:index.php');
    }else{
        $_SESSION['created'] = "Login was not successful";
        header('location:login.php');
    }
}
?>