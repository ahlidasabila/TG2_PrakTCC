<?php

$conn = mysqli_connect("localhost", "root", "", "responsi" );

function inven($data){
    global $conn;

    $kode_barang = ($data["kode_barang"]);
    $nama_barang = ($data["nama_barang"]);
    $jumlah = ($data["jumlah"]);
    $satuan = ($data["satuan"]);
    $tgl_datang = ($data["tgl_datang"]);
    $kategori = ($data["kategori"]);
    $status = ($data["status_barang"]);
    $harga = ($data["harga"]);

    
    //cek kode barang sudah ada atau belum
    $result = mysqli_query($conn, "SELECT kode_barang FROM inventaris WHERE kode_barang = '$kode_barang'");
    if ( mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Kode Barang Sudah Ada!')
            </script>";
        return false;
    }

    //tambah user baru ke database
    mysqli_query($conn, "INSERT INTO inventaris VALUES ('$kode_barang', '$nama_barang', '$jumlah', '$satuan', '$tgl_datang', '$kategori', '$status', '$harga' )");

    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;

    $kode_barang = ($data["kode_barang"]);
    $nama_barang = ($data["nama_barang"]);
    $jumlah = ($data["jumlah"]);
    $satuan = ($data["satuan"]);
    $tgl_datang = ($data["tgl_datang"]);
    $kategori = ($data["kategori"]);
    $status = ($data["status"]);
    $harga = ($data["harga"]);

    
    $SQL =mysqli_query($conn, "UPDATE inventaris SET 
        `kode_barang` = '$kode_barang',
        `nama_barang` = '$nama_barang',
        `jumlah` = '$jumlah',
        `satuan` = '$satuan',
        `tgl_datang` = '$tgl_datang',
        `kategori` = '$kategori',
        `status_barang` = '$status',
        `harga` = '$harga'
        WHERE `kode_barang` = '$kode_barang'");

    return mysqli_affected_rows($conn);
}


?>