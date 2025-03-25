<div class="container my-5">
    <div class="row">
        <div class="col-md-12 text-center mb-4">
            <h2>Kegiatan Menyelam di Wakatobi</h2>
            <p>Nikmati kegiatan menyelam seru di Wakatobi yang kami tawarkan untuk Anda.</p>
        </div>
    </div>
    
    <div class="row">
        <?php foreach($data['activities'] as $activity): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow">
                    <div class="card-body">
                        <h5 class="card-title"><?= $activity['title'] ?></h5>
                        <p class="card-text"><?= $activity['description'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>