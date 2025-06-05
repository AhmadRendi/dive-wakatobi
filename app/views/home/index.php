<div class="hero-section">
    <div class="container text-white">
        <h1>Selamat Datang di Wakatobi Dive Center</h1>
        <p class="lead">Temukan pengalaman menyelam terbaik di surga bawah laut Wakatobi.</p>
        <?php if($_SESSION['user_role'] == "USER" || $_SESSION['user_role'] == "ADMIN"): ?>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTestimoni">
                Tambah Testimoni
            </button>
        <?php endif; ?>
    </div>
</div>

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
                                <img src="<?= BASEURL; ?>/img/asset/<?= $testimonial['picture']; ?>" class="profile-img" alt="Profile">
                            </div>
                            <h4>
                                <?php echo $testimonial['namaLengkap']; ?>
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
                                <?php echo $testimonial['komentar']; ?>
                            </p>
                            <div class="testimonial-meta d-flex justify-content-center align-items-center">
                                <span class="date"><?php echo date('d M Y', strtotime($testimonial['tanggal'])) ?></span>
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
<div class="modal fade" id="modalTestimoni" tabindex="-1" aria-labelledby="modalTestimoniLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalTestimoniLabel">Testimoni</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3" action="<?= BASEURL;?>/Testimoni/add" method="POST">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Rating</label>
                <input type="number" min="1" max="5" class="form-control" id="rating" name="rating" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Komentar</label>
                <textarea class="form-control" id="komentar" name="komentar" rows="3" required></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>