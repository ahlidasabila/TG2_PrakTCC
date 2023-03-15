<?php
session_start();
if (!isset($_SESSION["login"]))
{
	echo "<script>
	alert('Login Terlebih Dahulu!');
	document.location.href = 'login.php';
	</script>";
	exit;
 }
include 'fungsi.php';

	$kode = $_POST['kode_barang'];
	$SQL = mysqli_query($conn,"DELETE FROM inventaris WHERE kode_barang='$kode'");
	if($SQL){
		echo "<script>
        alert('Data Berhasil dihapus');
        document.location.href = 'inventaris.php';
        </script>";
        exit;
	}
	else{
		echo "Data Gagal Dihapus";
	}



   
?>