<div class="container my-5">
    <div class="row">
        <div class="col-md-12 text-center mb-4">
            <h2>Paket Penyelaman Wakatobi</h2>
            <p>Pilih paket perjalanan yang sesuai dengan kebutuhan Anda</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <?php if(!empty($data)): ?>
        <?php foreach($data as $package): ?>
        <div class="col-md-3 mb-4">
            <div class="card h-100 shadow-lg border border-0 align-items-center">
                <div>
                    <img src="<?= BASEURL ?>/img/asset/<?= $package['gambar'] ?>" class="card-img-top" alt="...">
                </div>
                <div class="card border border-0 align-items-center">
                    <div class="card mt-3 mb-3 border border-0 justify-content-center">
                        <h5 class="card-title">
                            <?= $package['nama'] ?>
                        </h5>
                    </div>
                    <div class="card mb-3 border border-0 justify-content-center">
                        <p class="card-text">
                            <?= substr($package['deskripsi'], 0, 100) . (strlen($package->description) > 100 ? '...' : '') ?>
                        </p>
                    </div>
                    <div class="card border border-0 mb-3 justify-content-center">
                        <p class="card-text font-weight-bold">Rp
                            <?= number_format($package['harga'], 0, ',', '.') ?>
                        </p>
                    </div>
                    <div class="card border border-0 mb-3 justify-content-center">
                        <button class="btn btn-primary">Detail</button>
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
</div>