<div class="container">
    <h2>Dasbor</h2>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="dashboard-card">
                <h3>
                    <?= $data['stats']['packages'] ?>
                </h3>
                <p>Paket Wisata</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="dashboard-card">
                <h3>
                    <?= $data['stats']['orders'] ?>
                </h3>
                <p>Pemesanan Paket</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="dashboard-card">
                <h3>
                    <?= $data['stats']['success_rate'] ?>%
                </h3>
                <p>Transaksi Berhasil</p>
            </div>
        </div>
    </div>

    <div class="activities-card card mt-4">
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