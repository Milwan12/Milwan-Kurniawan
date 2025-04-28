<?php
include 'header.php'; 

// Cek jika 'id' ada dalam URL
if (isset($_GET["id"])) {
    // Decode ID yang diterima dan sanitasi input untuk menghindari SQL Injection
    $id = mysqli_real_escape_string($konek, base64_decode($_GET["id"]));

    // Query untuk mengambil data berdasarkan ID
    $sqlku = mysqli_query($konek, "SELECT * FROM tbl_file WHERE kode='$id'");
    
    // Cek jika data ditemukan
    if (mysqli_num_rows($sqlku) > 0) {
        $data = mysqli_fetch_array($sqlku);
    } else {
        echo "Data tidak ditemukan!";
        exit;
    }
} else {
    echo "ID tidak ditemukan!";
    exit;
}
?>
<head>
    <title>
        <?php echo htmlspecialchars($data['judul']); ?>
    </title>
</head>

<section id="blog" class="blog section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-4 col-xs-12">
                <div class="section-title">
                    <h3><?php echo htmlspecialchars($data['judul']); ?></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" data-wow-duration="0.8s" data-wow-delay="0.4s">
                <!-- single-news -->
                <div class="single-news">
                    <div class="news-head">
                        <div class="news-date">
                            <br><br>
                            <span><?php echo htmlspecialchars($data['tgl_posting']); ?></span> 
                        </div>
                        <img width="50%" height="300px" src="img/materi/<?php echo htmlspecialchars($data['data_file']); ?>" alt="Gambar Gagal di Cari">
                        <div class="news-view"> 
                            <?php echo htmlspecialchars($data['user']); ?>
                        </div>
                    </div>
                    <div class="news-body">
                        <p><?php echo nl2br(htmlspecialchars($data['konten'])); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
