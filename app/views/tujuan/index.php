<div class="container my-5">
    <div class="row">
        <div class="col-md-12 text-center mb-4">
            <h2>Tujuan Wisata di Wakatobi</h2>
            <p>Nikmati keindahan alam Wakatobi yang terdiri dari 4 pulau yang memukau.</p>
        </div>
    </div>
    <div class="row">
        <?php foreach($data['destinations'] as $destination): ?>
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-lg border-0">
                    <div class="card-body">
                        <h5 class="card-title"><?= $destination['title'] ?></h5>
                        <p class="card-text"><?= $destination['description'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>