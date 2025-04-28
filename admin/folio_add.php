<?php 
include 'header.php'; 
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
                        <li class="breadcrumb-item active">Galeri</li>
                    </ul>

                    <!-- Form to add gallery -->
                    <section class="statistics">
                        <div class="container-fluid">
                            <div class="row d-flex">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama *</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="txtnama" class="form-control" placeholder="Nama" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Deskripsi *</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="txtalamat" class="form-control" placeholder="Deskripsi" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Gambar *</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="txtgambar" class="form-control" required>
                                        </div>
                                    </div>
                                    <p class="text-right">
                                        <button type="submit" name="btnsimpan" class="btn btn-primary">Simpan</button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>
                </form>  

                <?php
                if (isset($_POST["btnsimpan"])) {
                    $txtnama = $_POST['txtnama'];
                    $txtalamat = $_POST['txtalamat'];
                    $nama_file = strtolower($_FILES['txtgambar']['name']);
                    $lokasi_file = $_FILES['txtgambar']['tmp_name'];

                    $simpan = mysqli_query($konek, "INSERT INTO tbl_folio (nama, alamat, gambar) VALUES ('$txtnama', '$txtalamat', '$nama_file')");
                    if ($simpan) {
                        if (!empty($lokasi_file)) {
                            move_uploaded_file($lokasi_file, "../img/folio/$nama_file");
                            echo "<script type='text/javascript'>
                                    alert('Data Anda Berhasil disimpan');
                                    document.location.href='folio_add.php';
                                  </script>";
                        }
                    }
                }
                ?>

                <!-- Table to list gallery -->
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Galeri</h3>
                        </div>
                        <div class="box-body no-padding">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Nama Gambar</th>
                                            <th>Keterangan</th>
                                            <th width="5%" colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no = 1;
                                        $qry = mysqli_query($konek, "SELECT * FROM tbl_folio");
                                        while ($data = mysqli_fetch_assoc($qry)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['nama']; ?></td>
                                            <td><?php echo $data['alamat']; ?></td>
                                            <td>
                                                <a href="folio_edit.php?id=<?php echo base64_encode($data['kode']); ?>" class="fa fa-edit"></a>
                                            </td>
                                            <td>
                                                <a href="folio_hapus.php?id=<?php echo $data['kode']; ?>" class="fa fa-times"></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
