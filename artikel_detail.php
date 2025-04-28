<?php 
include 'header.php';
include 'koneksi.php'; 

// Ambil ID artikel
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = base64_decode($_GET['id']);
    $id = intval($id); // Amankan ID biar harus angka

    // Cek apakah artikel tersedia
    $cek = mysqli_query($konek, "SELECT * FROM tbl_blog WHERE kode = '$id' AND status = 'publish'");
    if (mysqli_num_rows($cek) > 0) {
        // Tambah views
        mysqli_query($konek, "UPDATE tbl_blog SET views = views + 1 WHERE kode = '$id'");

        $data = mysqli_fetch_assoc($cek);
        $judul = htmlspecialchars($data['judul']);
        $konten = nl2br($data['konten']);
        $tgl_posting = htmlspecialchars($data['tgl_posting']);
        $gambar = !empty($data['gambar']) ? htmlspecialchars($data['gambar']) : 'default.png';
        $kategori = htmlspecialchars($data['kategori']);
        
        // Menambahkan pengecekan untuk views
        $views = isset($data['views']) ? number_format($data['views']) : '0';
    } else {
        header("Location: 404.php"); // Redirect ke halaman 404 kalau artikel tidak ditemukan
        exit();
    }
} else {
    header("Location: 404.php"); // Redirect ke halaman 404 kalau ID kosong
    exit();
}
?>

<section class="blog section">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="single-news">
                    <div class="news-head">
                        <img src="img/blog/<?php echo $gambar; ?>" alt="<?php echo $judul; ?>" style="width:100%; height:350px; object-fit:cover;">
                    </div>
                    <div class="news-body">
                        <h2><?php echo $judul; ?></h2>
                        <p><small>Kategori: <?php echo $kategori; ?> | Diposting: <?php echo $tgl_posting; ?> | Dibaca: <?php echo $views; ?> kali</small></p>
                        <hr>
                        <p><?php echo $konten; ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
