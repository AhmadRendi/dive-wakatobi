<div class="main-content">
    <div class="header mb-4 d-flex justify-content-between align-items-center">
        <h4 class="m-0"></h4>
        <div class="d-flex align-items-center">
            <a href="<?= BASEURL ?>/Profile" class="ms-2">
                <img src="<?= BASEURL;?>/img/asset/<?= $_SESSION['picture']; ?>" class="rounded-circle ms-2" alt="Profile"
                style="width: 40px; height: 40px;">
            </a>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card mb-4 border border-0 shadow-lg">
            <div class="card-body shadow p-3 bg-body rounded">
                <h2>Dasbor</h2>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="dashboard-card border border-0 shadow-sm">
                            <h3>
                                <?= $data['totalPaket']['total'] ?>
                            </h3>
                            <p>Paket Wisata</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="dashboard-card border border-0 shadow-sm">
                            <h3>
                                <?= $data['totalPemesanan']['total'] ?>
                            </h3>
                            <p>Pemesanan Paket</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="dashboard-card border border-0 shadow-sm">
                            <h3>
                                <?= $data['success_pemesanan']['total'] ?>%
                            </h3>
                            <p>Transaksi Berhasil</p>
                        </div>
                    </div>

                    <div class="container">
                        <div class="activities-card card mt-4 shadow-lg">
                            <div class="card-header">
                                Aktivitas Terbaru
                            </div>
                            <ul class="list-group list-group-flush">
                                <?php foreach($data['activities'] as $activity): ?>
                                    <li class="list-group-item">
                                    <?= $activity['text'] ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>