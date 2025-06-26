<div class="activities-section">
        <div class="container">
            <div class="section-header">
                <h2 class="">Kegiatan Menyelam di Wakatobi</h2>
                <p class="section-subtitle">Nikmati kegiatan menyelam seru di Wakatobi yang kami tawarkan untuk Anda. Setiap pengalaman dirancang khusus untuk memberikan petualangan tak terlupakan di bawah laut yang menakjubkan.</p>
            </div>
            
            <div class="row">
                <?php 
                $counter = 1;
                foreach($data['activities'] as $activity): 
                ?>
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="card activity-card h-100 fade-in-up">
                            <div class="card-image-container">
                                <img src="<?= BASEURL; ?>/img/asset/<?= $activity['picture'] ?>" class="card-img-top" alt="...">
                            </div>
                            
                            <div class="card-body">
                                <h5 class="card-title"><?= $activity['title'] ?></h5>
                                <p class="card-text"><?= $activity['description'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php 
                $counter++;
                endforeach; 
                ?>
            </div>
        </div>
            </div>
