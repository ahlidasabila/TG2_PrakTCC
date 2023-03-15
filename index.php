<?php 
session_start();
if(!isset($_SESSION['login'])){
    echo "<script>
    alert('Login Terlebih Dahulu!');
    document.location.href = 'login.php';
    </script>";
    exit;
}
require 'fungsi.php';
$username = $_SESSION['login'];
$data = mysqli_query ($conn, "SELECT * FROM petugas WHERE petugas.username = '$username' ");
$hasil = mysqli_fetch_array($data);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kantor Serba Ada</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="text-center text-light header pt-2">
        <h2><div>DAFTAR INVENTARIS BARANG</div>
        <div>KANTOR SERBA ADA</div></h2>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav" >
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="inventaris.php">Daftar Inventaris</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                List per Kategori
                </a>
                <div class="dropdown-menu kategori" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="inventaris.php?kategori=Bangunan">Bangunan</a>
                <a class="dropdown-item" href="inventaris.php?kategori=Kendaraan">Kendaraan</a>
                <a class="dropdown-item" href="inventaris.php?kategori=Alat Tulis Kantor">Alat Tulis Kantor</a>
                <a class="dropdown-item" href="inventaris.php?kategori=Elektronik=">Elektronik</a>
                </div>
            </li>
            </ul>
        </div>

        <button type="button" class="logout text-light" data-toggle="modal" data-target="#logout">Logout</button>
    </nav>
    <div class="text-center">
        <h3 class="welcome font-weight-bold">Selamat Datang</h3>
        <h1 class="name font-weight-bold"><?php echo $hasil['nama_lengkap'];  ?></h1>
    </div>
    <div class="footer text-center text-white p-3">
        Inventaris 2016
    </div>
                                        <!-- Modal -->
    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header text-light" style="background-color: #04013d">
            <h4 class="modal-title">Logout</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-light">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Yakin ingin keluar?
        </div>
        <div class="modal-footer">
            <a href="logout.php" class="btn text-light" style="background-color: #ff1b54">Logout</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
</body>
</html>


    