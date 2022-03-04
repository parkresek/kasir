<?php 

session_start();

// koneksi
$k=mysqli_connect('localhost','root','password','kasir');

//login
if (isset($_POST['login'])){
    $user = $_POST['user_name'];
    $password = $_POST['password'];

    $kon=mysqli_query($k,"SELECT * FROM user WHERE user_name='$user' and password='$password'");
    $hit=mysqli_num_rows($kon);

    if($hit>0){
        //data ditemukan
        $_SESSION['login']='true';
        header('location:index.php');
    }
    else{
        // data tidak ditemukan
        echo'
        <script>alert ("user Name atau Password Salah")
        window.location.href="login.php"
        </script>';
    }
}


?>