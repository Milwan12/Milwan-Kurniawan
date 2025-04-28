<?php include 'header.php'; ?>
<?php include 'koneksi.php'; ?>

<section id="blog" class="blog section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-title">
                    <h2>LIST <span>ARTIKEL</span></h2>
                </div>
            </div>
        </div>

        <div class="row">
            <?php
            // Pagination settings
            $batas = 6; // jumlah artikel per halaman
            $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

            $previous = $halaman - 1;
            $next = $halaman + 1;

            $data = mysqli_query($konek, "SELECT * FROM tbl_blog WHERE status = 'publish'");
            $jumlah_data = mysqli_num_rows($data);
            $total_halaman = ceil($jumlah_data / $batas);

            $qry = mysqli_query($konek, "SELECT * FROM tbl_blog WHERE status = 'publish' ORDER BY tgl_posting DESC LIMIT $halaman_awal, $batas");

            while ($data = mysqli_fetch_assoc($qry)) {
                $encoded_id = base64_encode($data['kode']);
                $judul = htmlspecialchars($data['judul']);
                $kategori = htmlspecialchars($data['kategori']);
                $gambar = !empty($data['gambar']) ? htmlspecialchars($data['gambar']) : 'default.png';
                $tgl_posting = htmlspecialchars($data['tgl_posting']);
                
                // Menambahkan pengecekan untuk kolom views
                $views = isset($data['views']) ? number_format($data['views']) : '0';
            ?>
                <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.4s">
                    <div class="single-news">
                        <div class="news-head">
                            <div class="news-date">
                                <span>NEW</span>
                                <span>ARTIKEL</span>
                                <span><?php echo $tgl_posting; ?></span>
                            </div>
                            <img src="img/blog/<?php echo $gambar; ?>" alt="<?php echo $judul; ?>" style="width:100%; height:250px; object-fit:cover;">
                            <div class="news-view">
                                <span><i class="fa fa-folder"></i> <?php echo $kategori; ?></span>
                                <span><i class="fa fa-eye"></i> <?php echo $views; ?> Views</span>
                            </div>
                        </div>
                        <div class="news-body">
                            <h2>
                                <a href="artikel_detail.php?id=<?php echo $encoded_id; ?>">
                                    <?php echo $judul; ?>
                                </a>
                            </h2>
                            <a href="artikel_detail.php?id=<?php echo $encoded_id; ?>" class="btn">
                                Read More <i class="fa fa-angle-double-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- PAGINATION -->
        <div class="row text-center">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <?php if($halaman > 1){ ?>
                        <li class="page-item">
                            <a class="page-link" href="?halaman=<?php echo $previous; ?>">Previous</a>
                        </li>
                    <?php } ?>

                    <?php for($x=1;$x<=$total_halaman;$x++){ ?>
                        <li class="page-item <?php if($x == $halaman) echo 'active'; ?>">
                            <a class="page-link" href="?halaman=<?php echo $x; ?>"><?php echo $x; ?></a>
                        </li>
                    <?php } ?>

                    <?php if($halaman < $total_halaman){ ?>
                        <li class="page-item">
                            <a class="page-link" href="?halaman=<?php echo $next; ?>">Next</a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
        <!-- END PAGINATION -->

    </div>
</section>

<?php include 'footer.php'; ?>
