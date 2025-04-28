<title>Galeri</title>
<?php include 'header.php'; ?>

<section id="latest-works" class="latest-works section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-title text-center">
                    <h2>My <span>GALERI</span></h2>
                </div>
            </div>
        </div>

        <!-- Galeri -->
        <div class="row">
            <?php
            $qry = mysqli_query($konek, "SELECT * FROM tbl_folio");
            while ($data = mysqli_fetch_assoc($qry)) {
            ?>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="single-work" style="background: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); transition: all 0.3s ease; position: relative;">
                        <!-- Gambar -->
                        <div class="work-img" style="position: relative; overflow: hidden; height: 250px;">
                            <img src="img/folio/<?php echo $data['gambar']; ?>" alt="#" class="img-fluid w-100" style="object-fit: cover; height: 100%; width: 100%; transition: transform 0.3s ease;">
                            
                            <!-- Efek Hover dengan Overlay -->
                            <div class="hover-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.4); color: white; opacity: 0; display: flex; justify-content: center; align-items: center; transition: opacity 0.3s ease;">
                                <h4 class="text-center" style="font-size: 18px; font-weight: bold;">
                                    <?php echo $data['nama']; ?><br> <?php echo $data['alamat']; ?>
                                </h4>
                            </div>
                        </div>
                        <!-- Deskripsi dan Nama -->
                        <div class="work-content p-3" style="position: absolute; bottom: 0; left: 0; width: 100%; background: rgba(255, 255, 255, 0.7); text-align: center;">
                            <h5 class="text-dark" style="font-weight: bold;"><?php echo $data['nama']; ?></h5>
                            <p class="text-muted" style="font-size: 14px; color: #555;">
                                <?php echo $data['alamat']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</section>

<style>
 /* Menambah jarak antara gambar dan teks */
.single-work {
    margin-bottom: 30px; /* Memberikan jarak antar setiap kolom */
}

.work-content {
    margin-top: 10px; /* Memberikan jarak antara gambar dan teks */
}

/* Efek zoom pada gambar saat dihover */
.single-work:hover .work-img img {
    transform: scale(1.05);
}

/* Menampilkan overlay saat gambar di-hover */
.single-work:hover .hover-overlay {
    opacity: 1;
}

/* Styling untuk teks deskripsi di bawah gambar */
.work-content h5 {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 10px;
}

.work-content p {
    font-size: 14px;
    color: #555;
}

</style>
<?php include 'footer.php'; ?>
