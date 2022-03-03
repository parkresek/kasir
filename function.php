<?php 

session_start();

// koneksi
$k=mysqli_connect('localhost','root','password','kasir');

//login
if (isset($_POST['login'])){
    $_user = $_POST['user'];
    $_password = $_POST['password'];

    $_kon=mysqli_query($k,"SELECT * FROM user WHERE user= '$user' and password='$password'");
}


?>