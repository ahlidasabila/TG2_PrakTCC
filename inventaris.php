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
if (isset($_POST["inven"])) {
	if(inven($_POST) > 0) {
		echo "<script>
			alert('Data berhasil ditambahkan!');
			document.location.href = 'inventaris.php';
			</script>";	
	}
	else {
		echo "<script>
			alert('error!');
			</script>";
		echo mysqli_error($conn);
	}	
}

if (isset($_POST["ubah"])) {
	if(ubah($_POST) > 0) {
		echo "<script>
			alert('Data berhasil diubah!');
			document.location.href = 'inventaris.php';
			</script>";	
	}
	else {
		echo "<script>
			alert('error!');
			</script>";
		echo mysqli_error($conn);
	}	
}
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <title>Kantor Serba Ada</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
    </style>
</head>
<body>
    <div class="text-light text-center header pt-2">
        <h2><div>DAFTAR INVENTARIS BARANG</div>
        <div>KANTOR SERBA ADA</div></h2>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php" style="height: 30px">Beranda <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="inventaris.php" style="height: 30px">Daftar Inventaris</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" style="height: 30px" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                List per Kategori
                </a>
                <div class="dropdown-menu kategori" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="inventaris.php?kategori=Bangunan">Bangunan</a>
                <a class="dropdown-item" href="inventaris.php?kategori=Kendaraan">Kendaraan</a>
                <a class="dropdown-item" href="inventaris.php?kategori=Alat Tulis Kantor">Alat Tulis Kantor</a>
                <a class="dropdown-item" href="inventaris.php?kategori=Elektronik">Elektronik</a>
                </div>
            </li>
            </ul>
        </div>

        <button type="button" class="logout text-light" data-toggle="modal" data-target="#logout">Logout</button>
    </nav>
    <button type="button" class="nav-link tambah text-light" data-toggle="modal" data-target="#tambahmodal">
        +Tambah
    </button>
                                        <!-- Modal -->
    <div class="modal fade" id="tambahmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content p-3">
        <div class="text-center text-light py-1" style="background-color: #04013d">
            <h5>Tambah Data Inventaris</h5>
        </div>
        <form action="" method="post" class="p-3">
            <div class="row">
                <div class="form-group align-self-center col-md-4">Kode Barang</div>
                <div class="form-group col-md-8">
                    <input name="kode_barang" type="text" class="form-control" style="border: 1px solid #2f299e; border-radius: 2px" placeholder="Kode Barang" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group align-self-center col-md-4">Nama Barang</div>
                <div class="form-group col-md-8">
                    <input name="nama_barang" type="text" class="form-control" style="border: 1px solid #2f299e; border-radius: 2px" placeholder="Nama Barang" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group align-self-center col-md-4">Jumlah</div>
                <div class="form-group col-md-4">
                    <input name="jumlah" type="number" class="form-control" style="border: 1px solid #2f299e; border-radius: 2px" placeholder="Jumlah" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group align-self-center col-md-4">Satuan</div>
                <div class="form-group col-md-4">
                    <input name="satuan" type="text" class="form-control" style="border: 1px solid #2f299e; border-radius: 2px" placeholder="Satuan" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group align-self-center col-md-4">Tanggal Datang</div>
                <div class="form-group col-md-6">
                    <input name="tgl_datang" type="date" class="form-control" style="border: 1px solid #2f299e; border-radius: 2px" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group align-self-center col-md-4">Kategori</div>
                <div class="form-group col-md-6">
                    <select name="kategori" class="form-control" required>
                        <option value="Bangunan">Bangunan</option>
                        <option value="Kendaraan">Kendaraan</option>
                        <option value="Alat Tulis Kantor">Alat Tulis Kantor</option>
                        <option value="Elektronik">Elektronik</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group align-self-center col-md-4">Status</div>
                <div class="form-group col-md-6">
                <div class="d-flex">
                    <input type="radio" name="status" value="Baik" class="align-self-center mr-1" required>Baik
                    <input type="radio" name="status" value="Perawatan" class="align-self-center ml-3 mr-1" required>Perawatan
                    <input type="radio" name="status" value="Rusak" class="align-self-center ml-3 mr-1" required>Rusak
                </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group align-self-center col-md-4">Harga Satuan</div>
                <div class="form-group col-md-8">
                    <input name="harga" type="number" class="form-control" style="border: 1px solid #2f299e; border-radius: 2px" placeholder="Harga Satuan" required>
                </div>
            </div>
            <div class="row justify-content-center mt-2">
                <input type="submit" name="inven" id="inven" value="Tambah" class="tombol py-2 mx-1 text-light btn" >
				<button type="button" class="tombol py-2 mx-1 text-light btn" data-dismiss="modal">Batal</button>
            </div>
        </form>
        </div>
    </div>

    </div>
    <div class="content"> 
    <table class="table text-center">
        <thead class="table-header text-light font-weight-bold" style="background-color: #04013d">
            <tr>
                <td class="align-middle">No</td>
                <td class="align-middle">Kode</td>
                <td class="align-middle">Nama Barang</td>
                <td class="align-middle">Jumlah</td>
                <td class="align-middle">Satuan</td>
                <td class="align-middle">Tanggal<br>Datang</td>
                <td class="align-middle">Kategori</td>
                <td class="align-middle">Status</td>
                <td class="align-middle">Harga Satuan</td>
                <td class="align-middle">Total Harga</td>
                <td class="align-middle">Aksi</td>
            </tr>
        </thead>
        <tbody class="table-body">
            <?php 
                
                if(isset($_GET['kategori'])){
                    $kategori = $_GET['kategori'];
                    $SQL = "SELECT * FROM `inventaris` WHERE `kategori` = '$kategori'";
                } else {
                    $SQL = "SELECT * FROM `inventaris`";
                }
                $sql_run = mysqli_query($conn,$SQL);
                $i = 1;
                $total=0;
                while($inventaris = mysqli_fetch_assoc($sql_run)):
                $total+=$inventaris['harga']*$inventaris['jumlah'];
            ?>
            <tr>
            <td class="align-middle"><?= $i++ ?></td>
                <td class="align-middle"><?= $inventaris['kode_barang'] ?></td>
                <td class="align-middle"><?= $inventaris['nama_barang'] ?></td>
                <td class="align-middle"><?= $inventaris['jumlah'] ?></td>
                <td class="align-middle"><?= $inventaris['satuan'] ?></td>
                <td class="align-middle"><?= date('d-m-Y', strtotime($inventaris['tgl_datang'])) ?></td>
                <td class="align-middle"><?= $inventaris['kategori'] ?></td>
                <td class="align-middle"><?= $inventaris['status_barang'] ?></td>
                <td class="align-middle">Rp. <?= number_format($inventaris['harga'], 2, "," , ".") ?></td>
                <td class="align-middle">Rp. <?= number_format($inventaris['jumlah']*$inventaris['harga'], 2, ",", ".") ?></td>
                <td class="align-middle">
                <button type="button" class="tombol text-light mx-1 py-1" data-toggle="modal" data-target="#EditModal<?= $inventaris['kode_barang'] ?>" style="width: 70px; border: 0px">Edit</button>   
                <button type="button" class="tombol text-light mx-1 py-1" data-toggle="modal" data-target="#DeleteModal<?= $inventaris['kode_barang'] ?>" style="width: 70px; border: 0px">Hapus</button>   
                </td>
            </tr>
                                            <!-- Modal -->
            <div class="modal fade" id="DeleteModal<?= $inventaris['kode_barang'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content p-3">
                <div class="text-center text-light py-1" style="background-color: #04013d">
                    <h5>Hapus Data Inventaris</h5>
                </div>
                <div class="mt-3">
                Anda Yakin ingin Menghapus <span style="color: blue"><?= $inventaris['nama_barang'] ?></span> ?
                </div>
                <div class="row justify-content-end mt-4 pr-2">
                        <form action="hapus.php" method="post">
                        <input type="hidden" name="kode_barang" value="<?= $inventaris['kode_barang'] ?>">
                        <button type="submit" class="tombol py-1 mx-1 text-light btn" style="width: 70px">Hapus</button>
                        </form>
                        <button type="button" class="tombol py-1 mx-1 text-light btn" data-dismiss="modal" style="width: 70px">Batal</button>
                    </div>
                </div>
            </div>
            </div>
                                                    <!-- Modal -->
            <div class="modal fade" id="EditModal<?= $inventaris['kode_barang'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content p-3">
                <div class="text-center text-light py-1" style="background-color: #04013d">
                    <h5>Edit Data Inventaris</h5>
                </div>
                <form action="" method="post" class="p-3">
                <input type="hidden" name="kode_barang" value="<?= $inventaris['kode_barang'] ?>">
                    <div class="row">
                        <div class="form-group align-self-center col-md-4">Kode Barang</div>
                        <div class="form-group col-md-8">
                            <input name="kode_barang" type="text" class="form-control" style="border: 1px solid #2f299e; border-radius: 2px" placeholder="Kode Barang" value="<?= $inventaris['kode_barang'] ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group align-self-center col-md-4">Nama Barang</div>
                        <div class="form-group col-md-8">
                            <input name="nama_barang" type="text" class="form-control" style="border: 1px solid #2f299e; border-radius: 2px" placeholder="Nama Barang" value="<?= $inventaris['nama_barang'] ?>"required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group align-self-center col-md-4">Jumlah</div>
                        <div class="form-group col-md-4">
                            <input name="jumlah" type="number" class="form-control" style="border: 1px solid #2f299e; border-radius: 2px" placeholder="Jumlah" value="<?= $inventaris['jumlah'] ?>"required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group align-self-center col-md-4">Satuan</div>
                        <div class="form-group col-md-4">
                            <input name="satuan" type="text" class="form-control" style="border: 1px solid #2f299e; border-radius: 2px" placeholder="Satuan"  value="<?= $inventaris['satuan'] ?>"required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group align-self-center col-md-4">Tanggal Datang</div>
                        <div class="form-group col-md-6">
                            <input name="tgl_datang" type="date" class="form-control" style="border: 1px solid #2f299e; border-radius: 2px"  value="<?= $inventaris['tgl_datang'] ?>"required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group align-self-center col-md-4">Kategori</div>
                        <div class="form-group col-md-6">
                            <select name="kategori" class="form-control">
                                <option value="Bangunan"<?php if($inventaris['kategori']=="Bangunan") echo " selected"; ?>>Bangunan</option>
                                <option value="Kendaraan"<?php if($inventaris['kategori']=="Kendaraan") echo " selected"; ?>>Kendaraan</option>
                                <option value="Alat Tulis Kantor"<?php if($inventaris['kategori']=="Alat Tulis Kantor") echo " selected"; ?>>Alat Tulis Kantor</option>
                                <option value="Elektronik"<?php if($inventaris['kategori']=="Elektronik") echo " selected"; ?>>Elektronik</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group align-self-center col-md-4">Status</div>
                        <div class="form-group col-md-6">
                        <div class="d-flex">
                            <input type="radio" name="status" value="Baik"<?php if($inventaris['status_barang']=="Baik") echo " checked='checked'" ?> class="align-self-center mr-1">Baik
                            <input type="radio" name="status" value="Perawatan"<?php if($inventaris['status_barang']=="Perawatan") echo " checked='checked'" ?> class="align-self-center ml-3 mr-1">Perawatan
                            <input type="radio" name="status" value="Rusak"<?php if($inventaris['status_barang']=="Rusak") echo " checked='checked'" ?> class="align-self-center ml-3 mr-1">Rusak
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group align-self-center col-md-4">Harga Satuan</div>
                        <div class="form-group col-md-8">
                            <input name="harga" type="number" class="form-control" style="border: 1px solid #2f299e; border-radius: 2px" placeholder="Harga Satuan" value="<?= $inventaris['harga'] ?>" required>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2">
                    <input type="submit" name="ubah" id="ubah" value="Ubah" class="tombol py-2 mx-1 text-light btn" >
                        <button type="button" class="tombol py-2 mx-1 text-light btn" data-dismiss="modal" style="width: 100px">Batal</button>
                    </div>
                </form>
            </div>
            </div>
            </div>
            <?php endwhile; ?>
        </tbody>
    </table>
    <div style="position: absolute; left: 55%">Total Inventaris = Rp. <?= number_format($total, 2, ",", ".") ?></div>
    </div>
    <div class="footer text-center text-white p-3">
        Inventaris 2016
    </div>
    <!-- Modal -->
    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header text-light" style="background-color: #04013d">
            <h5 class="modal-title">Logout</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-light">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        Yakin ingin keluar?
        </div>
        <div class="modal-footer">
            <a href="logout.php" class="btn text-light" style="background-color: #04013d">Logout</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
   
</body>
</html>