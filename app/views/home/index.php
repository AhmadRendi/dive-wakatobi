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

<div class="container my-5">
        <div class="row">
            <div class="col-md-12 text-center mb-4">
                <h2>Paket Kursus Wakatobi</h2>
                <p>Pilih paket perjalanan yang sesuai dengan kebutuhan Anda</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <?php if(!empty($data['kursus'])): ?>
            <?php foreach($data['kursus'] as $package): ?>
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-lg border border-0 align-items-center">
                    <div class="card-img-top">
                        <img src="<?= BASEURL ?>/img/asset/<?= $package['picture'] ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="card border border-0 align-items-center">
                        <div class="card mt-3 mb-3 border border-0 justify-content-center">
                            <h5 class="card-title">
                                <?= $package['namaPaket'] ?>
                            </h5>
                        </div>
                        <div class="card mb-3 border border-0 justify-content-center">
                            <p class="card-text">
                                <?= substr($package['deskripsi'], 0, 100) . (strlen($package->deskripsi) > 100 ? '...' : '') ?>
                            </p>
                        </div>
                        <div class="card border border-0 mb-3 justify-content-center">
                            <p class="card-text font-weight-bold">Rp
                                <?= number_format($package['harga'], 0, ',', '.') ?>
                            </p>
                        </div>
                        <!-- <div class="card border border-0 mb-3 justify-content-center">
                            <button class="btn btn-primary lihatDetaiPaketPenyelaman" data-id="<?= $package['id']; ?>" >Detail</button>
                        </div> -->
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
    </div>

    <div class="container my-5">
    <div class="row">
        <div class="col-md-12 text-center mb-4">
            <h2>Paket Penyelaman Wakatobi</h2>
            <p>Pilih paket perjalanan yang sesuai dengan kebutuhan Anda</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <?php if(!empty($data['penyelam'])): ?>
            <?php foreach($data['penyelam'] as $package): ?>
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-lg border border-0 align-items-center">
                        <div class="card-img-top">
                            <img src="<?= BASEURL ?>/img/asset/<?= $package['picture'] ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="card border border-0 align-items-center">
                            <div class="card mt-3 mb-3 border border-0 justify-content-center">
                                <h5 class="card-title">
                                    <?= $package['namaPaket'] ?>
                                </h5>
                            </div>
                            <div class="card mb-3 border border-0">
                                <p class="card-text d-flex justify-content-center align-items-center">
                                    <?= substr($package['deskripsi'], 0, 100) . (strlen($package->description) > 100 ? '...' : '') ?>
                                </p>
                            </div>
                            <div class="card border border-0 mb-3 justify-content-center">
                                <p class="card-text font-weight-bold">Rp
                                    <?= number_format($package['harga'], 0, ',', '.') ?>
                                </p>
                            </div>
                            <!-- <div class="card border border-0 mb-3 justify-content-center">
                                <button class="btn btn-primary lihatDetaiPaketPenyelaman" data-id="<?= $package['id']; ?>">Detail</button>
                            </div> -->
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
</div>

<section class="testimonial-section">
    <div class="container">
        <h2 class="section-title">Apa Kata Mereka Tentang Kami</h2>
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php foreach ($data['testimonials'] as $index => $testimonial): ?>
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