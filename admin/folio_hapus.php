<?php
include '../koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $qry = mysqli_query($konek, "SELECT gambar FROM tbl_folio WHERE kode='$id'");
    $data = mysqli_fetch_assoc($qry);

    $lokasi_gambar = "../img/folio/" . $data['gambar'];
    if (file_exists($lokasi_gambar)) {
        unlink($lokasi_gambar); // Hapus gambar
    }

    $hapus = mysqli_query($konek, "DELETE FROM tbl_folio WHERE kode='$id'");
    if ($hapus) {
        header("Location: folio_add.php");
    }
}
?>
