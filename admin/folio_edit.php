<?php 
include 'header.php'; 
$id = base64_decode($_GET["id"]);
$sqlku = mysqli_query($konek, "SELECT * FROM tbl_folio WHERE kode='$id'");
$data = mysqli_fetch_array($sqlku);
?>

<section class="statistics">
    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-lg-12">
                <form method="POST" enctype="multipart/form-data">
                    <!-- Breadcrumb -->
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="master.php">Home</a></li>
                        <li class="breadcrumb-item active">Master</li>
                        <li class="breadcrumb-item active">Edit Galeri</li>
                    </ul>

                    <!-- Edit Form -->
                    <section class="statistics">
                        <div class="container-fluid">
                            <div class="row d-flex">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama *</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="txtnama" value="<?php echo $data['nama']; ?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Deskripsi *</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="txtalamat" value="<?php echo $data['alamat']; ?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Gambar *</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="txtgambar" class="form-control">
                                        </div>
                                    </div>
                                    <p class="text-right">
                                        <button type="submit" name="btnedit" class="btn btn-primary">Edit</button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>
                </form>

                <?php
                if (isset($_POST["btnedit"])) {
                    $txtnama = $_POST['txtnama'];
                    $txtalamat = $_POST['txtalamat'];
                    $nama_file = $_FILES['txtgambar']['name'];
                    $lokasi_file = $_FILES['txtgambar']['tmp_name'];

                    $edit = mysqli_query($konek, "UPDATE tbl_folio SET nama='$txtnama', alamat='$txtalamat', gambar='$nama_file' WHERE kode='$id'");
                    if ($edit) {
                        if (!empty($lokasi_file)) {
                            move_uploaded_file($lokasi_file, "../img/folio/$nama_file");
                        }
                        echo "<script type='text/javascript'>
                                document.location.href='folio_add.php';
                              </script>";
                    } else {
                        echo "Terjadi kesalahan";
                    }
                }
                ?>

            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
