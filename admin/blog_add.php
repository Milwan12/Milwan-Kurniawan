<?php 
include 'header.php'; 
include '../koneksi.php'; // pastikan koneksi ke database
?>

<section class="statistics">
    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-lg-12">
                <form method="POST" enctype="multipart/form-data">
</section>

<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="master.php">Home</a></li>
    <li class="breadcrumb-item active">Master</li>
    <li class="breadcrumb-item active">Posting Blog</li>
</ul>

<section class="statistics">
    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-lg-12">

                <div class="form-group row has-success">
                    <label class="col-sm-2 form-control-label">KATEGORI</label>
                    <div class="col-sm-10">
                        <input type="text" name="txtkategori" class="form-control is-valid" placeholder="Kategori Berita" required>
                    </div>
                </div>

                <div class="form-group row has-success">
                    <label class="col-sm-2 form-control-label">JUDUL</label>
                    <div class="col-sm-10">
                        <input type="text" name="txtjudul" class="form-control is-valid" placeholder="Judul News / Artikel" required>
                    </div>
                </div>

                <div class="form-group row has-success">
                    <label class="col-sm-2 form-control-label">KONTEN</label>
                    <div class="col-sm-10">
                        <textarea class="ckeditor" name="txtkonten" required></textarea>
                    </div>
                </div>

                <div class="form-group row has-success">
                    <label class="col-sm-2 form-control-label">TANGGAL POSTING</label>
                    <div class="col-sm-10">
                        <input type="date" name="txttanggal" class="form-control is-valid" required>
                    </div>
                </div>

                <div class="form-group row has-success">
                    <label class="col-sm-2 form-control-label">USER</label>
                    <div class="col-sm-10">
                        <input type="text" name="txtuser" class="form-control is-valid" placeholder="Nama Posting" required>
                    </div>
                </div>

                <div class="form-group row has-success">
                    <label class="col-sm-2 form-control-label">STATUS</label>
                    <div class="col-sm-10">
                        <select name="txtstatus" class="form-control is-valid" required>
                            <option value="publish">Publish</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row has-success">
                    <label class="col-sm-2 form-control-label">GAMBAR</label>
                    <div class="col-sm-10">
                        <input type="file" name="txtgambar" class="form-control is-valid">
                    </div>
                </div>

                <input type="submit" name="btnsimpan" class="btn btn-primary" value="POSTING BLOG">

            </div>
        </div>
    </div>
</section>
</form>

<?php
if (isset($_POST["btnsimpan"])) {
    // Amankan input
    $txtkategori = mysqli_real_escape_string($konek, $_POST['txtkategori']);
    $txtjudul = mysqli_real_escape_string($konek, $_POST['txtjudul']);
    $txtkonten = mysqli_real_escape_string($konek, $_POST['txtkonten']);
    $txttanggal = mysqli_real_escape_string($konek, $_POST['txttanggal']);
    $txtuser = mysqli_real_escape_string($konek, $_POST['txtuser']);
    $txtstatus = mysqli_real_escape_string($konek, $_POST['txtstatus']);

    $nama_file = $_FILES['txtgambar']['name'];
    $lokasi_file = $_FILES['txtgambar']['tmp_name'];

    // Upload gambar jika ada
    if (!empty($nama_file)) {
        move_uploaded_file($lokasi_file, "../img/blog/$nama_file");
    } else {
        $nama_file = ""; // Jika tidak upload gambar
    }

    $simpan = mysqli_query($konek, "INSERT INTO tbl_blog (kategori, judul, konten, tgl_posting, user, status, gambar) VALUES ('$txtkategori', '$txtjudul', '$txtkonten', '$txttanggal', '$txtuser', '$txtstatus', '$nama_file')");

    if ($simpan) {
        echo "<script>alert('Data berhasil disimpan'); window.location='blog_add.php';</script>";
    } else {
        echo "<script>alert('Data gagal disimpan'); window.location='blog_add.php';</script>";
    }
}
?>

<?php include 'footer.php'; ?>
