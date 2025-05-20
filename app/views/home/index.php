<div class="hero-section">
    <div class="container text-white">
        <h1>Selamat Datang di Wakatobi Dive Center</h1>
        <p class="lead">Temukan pengalaman menyelam terbaik di surga bawah laut Wakatobi.</p>
        <a href="#" class="btn btn-success">Lihat Testimoni</a>
    </div>
</div>

<?php if($_SESSION['user_role'] == null): ?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <h2>Mengapa Memilih Kami?</h2>
            <p>Wakatobi adalah destinasi wisata selam terbaik di Indonesia, dengan terumbu karang yang indah dan biota
                laut yang beragam.</p>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if($_SESSION['user_role'] == "USER"): ?>
<!-- <div class="container my-5">
    <div class="row">
        <div class="col-md-12 text-center mb-4">
            <h2>Testimoni</h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <?php if(!empty($data)): ?>
        <?php foreach($data as $package): ?>
        <div class="col-md-3 mb-4">
            <div class="card h-100 shadow-lg border border-0 align-items-center">
                <div class="d-flex mt-4 position-absolute top-0 start-0 translate-middle-y">
                    <div class="rounded-circle" style="width: 35px; height: 35px;">
                        <img src="<?= BASEURL;?>/img/asset/image.png" class="rounded-circle"
                            alt="Profile" style="width: 35px; height: 35px;">
                    </div>
                    <div class="ms-1 mt-2">
                        <p> <?= $package['nama'] ?> </p>
                    </div>
                </div>
                <div class="card border border-0 align-items-center">
                    <div class="card mt-3 mb-3 border border-0 justify-content-center">
                        <h5 class="card-title">
                        </h5>
                    </div>
                    <div class="card mb-3 border border-0 justify-content-center">
                        <p class="card-text">
                            <p> <?= $package['rating'] ?> </p>
                        </p>
                    </div>
                    <div class="card border border-0 mb-3 justify-content-center" style="max-height: 100px; overflow-y: auto;">
                        <p class="card-text font-weight-bold">
                            <p> <?= $package['testimoni'] ?> </p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <div class="col-md-12">
            <div class="alert alert-info">Tidak ada paket perjalanan yang tersedia saat ini.</div>
        </div>
        <?php endif; ?>
    </div>
</div> -->
<section class="testimonial-section">
    <div class="container">
        <h2 class="section-title">Apa Kata Mereka Tentang Kami</h2>
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php foreach ($data as $index => $testimonial): ?>
                <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <div class="profile-img-container">
                                <img src="<?= BASEURL;?>/img/asset/image.png" class="profile-img"
                                    alt="Profile">
                            </div>
                            <h4>
                                <?php echo $testimonial['name']; ?>
                            </h4>
                            <div class="rating">
                                <?php $stars = '';
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= $testimonial['rating']) {
                                            $stars .= '<i class="fas fa-star text-warning"></i>'; // Bintang penuh
                                        } else {
                                            $stars .= '<i class="far fa-star text-warning"></i>'; // Bintang kosong
                                        }
                                    }
                                    echo $stars;
                                    ?>
                            </div>
                            <p class="comment-text">
                                <?php echo $testimonial['comment']; ?>
                            </p>
                            <div class="testimonial-meta d-flex justify-content-center align-items-center">
                                <!-- <span class="testimonial-id"><?php echo $testimonial['id']; ?></span> -->
                                <span class="date"><?php echo date('d M Y', strtotime($testimonial['date'])) ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            
            <div class="carousel-indicators">
                <?php for ($i = 0; $i < count($data); $i++): ?>
                <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="<?php echo $i; ?>" <?php echo $i === 0 ? 'class="active" aria-current="true"' : ''; ?> aria-label="Slide <?php echo $i + 1; ?>"></button>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>