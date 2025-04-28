
<?php include'header.php' ?>
 <title> Milwan : Portofolio</title>
		<section id="slider" class="slider" style="background-image:url('img/background-home.png')">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-sm-12 col-xs-12">
						<div class="text">
							<h1>Selamat Datang.</h1>
							<p>Muhammad Milwan Kurniawan</p>
							<div class="button">
								<a href="tentang.php" class="btn primary "><i class="fa fa-briefcase"></i>View Work</a>
								<a href="contact.php" class="btn"><i class="fa fa-phone"></i>Contact Me</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="about" class="about">
			<div class="container">
				<div class="row">
					<div class="about-content">
						<div class="col-md-2 col-sm-2 col-xs-12">
							<div class="section-title">
								<h2>About <span>Me</span></h2>
							</div>
						</div>

						<?php
            				$qry = mysqli_query($konek,"SELECT * FROM tbl_profil limit 1");
                			while ($data=mysqli_fetch_assoc($qry)) {
                		?>
						<div class="col-md-6  col-sm-6 col-xs-12">
							<div class="single-about">
								<p class="bolt"><?php echo $data['visi_misi']; ?></p>
								<div class="cv">
									<a target="_blank"href="#">Unduh CV</a>
								</div>
								<!-- <div class="social">
									<ul>
										<li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-instagram"></i></a></li>
									</ul>
								</div> -->
							</div>
						</div>
						<?php } ?>


						<?php
            				$qry = mysqli_query($konek,"SELECT * FROM tbl_bulan limit 1");
                			while ($data=mysqli_fetch_assoc($qry)) {
                		?>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<div class="image">
									<img src="img/milwan.jpg" alt="#" style="max-width: 100%; height: auto; width: 80%; display: block; margin: 20px auto 0;">
								</div>
							</div>

					<?php } ?>

					</div>
				</div>
			</div>
		</section>
		<section id="skill" class="skill section">
			<div class="container">
				<div class="row">
					<div class="col-md-2 col-sm-12 col-xs-12">
						<div class="section-title">
							<h2>My <span>Skill</span></h2>
						</div>
					</div>
					<div class="col-md-10 col-sm-12 col-xs-12">
						<div class="skill-head">
							<div class="row">

						<?php
            				$qry = mysqli_query($konek,"SELECT * FROM tbl_profil limit 1");
                			while ($data=mysqli_fetch_assoc($qry)) {
                		?>	
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="skill-content">
										<h3>DESKRIPSI SKILL</h3>
										<p>
											<?php echo $data['sejarah']; ?>
										</p>
									</div>
								</div>
						<?php } ?>

								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="skill-main">

								<?php
		            				$qry = mysqli_query($konek,"SELECT * FROM tbl_jadwal_solat limit 20");
		                			while ($data=mysqli_fetch_assoc($qry)) {
		                		?>
										<div class="single-skill">
											<div class="skill-title">
												<h4><?php echo $data['uraian']; ?></h4>
											</div>
											<div class="progress two">
												<div class="progress-bar" data-percent="<?php echo $data['jadwal']; ?>">
													<span><?php echo $data['jadwal']; ?>%</span>
												</div>
											</div>
										</div>
								<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="story" class="story section">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="section-title">
							<h2>PE<span>NDIDIKAN</span></h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
						<div class="story-content">
							<!-- single-story -->
							<div class="single-story">
								<span class="year wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.4s">2013</span>
								<div class="inner-content wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s">
									<h3>2013-2019</h3>
									<p>SD Negeri Kaliwadas 01</p>
								</div>
							</div>
							<!-- single-story -->
							<div class="single-story">
								<span class="year wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.6s">2019</span>
								<div class="inner-content wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.6s">
									<h3>2019–2022</h3>
									<p>SMP Negeri 2 Bumiayu</p>
								</div>
							</div>
							<!-- single-story -->
							<div class="single-story">
								<span class="year wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.8s">2022</span>
								<div class="inner-content wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.8s">
									<h3>2022–2025</h3>
									<p>MAN 2 BREBES [IPS]</p>
								</div>
							</div>
							<!-- single-story -->
							<div class="single-story">
								<span class="year wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="1s">2010</span>
								<div class="inner-content wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="1s">
									<h3>2025–Selesai.</h3>
									<p>S-1 Universitas Islam Negeri Prof. KH. Saifuddin Zuhri [Hukum Tata Negara 'Siyasah']</p>
								</div>
							</div>


						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="story" class="story section">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="section-title">
							<h2>AK<span>TIVITAS</span></h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
						<div class="story-content">
							<!-- single-story -->
							<div class="single-story">
								<span class="year wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.4s">2019</span>
								<div class="inner-content wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s">
									<h3> 2019 s/d 2020</h3>
									<p> Menjadi Anggota OSIS (Seksi Pendidikan Pancasila & Karakter Kebangsaan) di SMP Negeri 2 Bumiayu.</p>
								</div>
							</div>
							<div class="single-story">
								<span class="year wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.6s">2020</span>
								<div class="inner-content wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.6s">
									<h3> 2020 s/d 2021</h3>
									<p>Menjadi WAKIL KETUA OSIS di SMP Negeri 2 Bumiayu</p>
									
								</div>
							</div>
							<!-- single-story -->
							<div class="single-story">
								<span class="year wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.8s">2019</span>
								<div class="inner-content wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.8s">
									<h3> 2019 s/d 2021</h3>
									<p>Menjadi Anggota Ekstrakurikuler Hadroh di SMP Negeri 2 Bumiayu</p>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</section>

	<?php include'footer.php' ?>