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


if(isset($_POST['tambahbarang'])){
    $namaproduk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    $insert = mysqli_query($k,"insert into produk (nama_produk, deskripsi, harga, stok) values ('$namaproduk', '$deskripsi', '$harga', '$stok')");
    if($insert){
        header('location:stok.php');
    }
    else{
        echo'
        <script>alert ("Gagal Menyimpan Produk")
        window.location.href="stok.php"
        </script>';
    }
}


if(isset($_POST['tambahpelanggan'])){
    $namapelanggan = $_POST['namapelanggan'];
    $notelp = $_POST['notelp'];
    $alamat = $_POST['alamat'];

    $insert = mysqli_query($k,"insert into pelanggan (namapelanggan, notelp, alamat) values ('$namapelanggan', '$notelp', '$alamat')");
    if($insert){
        header('location:pelanggan.php');
    }
    else{
        echo'
        <script>alert ("Gagal Menyimpan data")
        window.location.href="pelanggan.php"
        </script>';
    }
}

?>