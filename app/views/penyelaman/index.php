<div class="container my-5">
    <div class="row">
        <div class="col-md-12 text-center mb-4">
            <h2>Paket Penyelaman Wakatobi</h2>
            <p>Pilih paket perjalanan yang sesuai dengan kebutuhan Anda</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <?php if(!empty($data['paket'])): ?>
            <?php foreach($data['paket'] as $package): ?>
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
                            <div class="card border border-0 mb-3 justify-content-center">
                                <button class="btn btn-primary lihatDetaiPaketPenyelaman" data-id="<?= $package['id']; ?>">Detail</button>
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


<!-- Modal -->
<div class="modal fade" id="lihatDetailPenyelaman" tabindex="-1" aria-labelledby="lihatDetailPenyelaman" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="lihatDetailPenyelaman">Detal Paket</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="detailPaketPenyelaman">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="namaPaket" class="form-label">Nama Paket</label>
                        <input type="text" class="form-control border border-dark" id="namaPaket"
                            name="namaPaket" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea type="textarea" class="form-control border border-dark" id="deskripsi"
                            name="deskripsi" readonly></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control border border-dark" id="harga" name="harga" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Lanjut</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Guide Selection Modal -->
<div class="modal fade" id="guideModal" tabindex="-1" aria-labelledby="guideModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="guideModalLabel">Pilih Tour Guide</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="selectGuideForm">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="idGuide" id="idGuide">
                    <input type="hidden" name="idKeahlian" id="idKeahlian">
                    <div class="card shadow-lg border border-0 mb-3">
                        <div class="card-body row">
                            <div class="col-md-4">
                                <label for="keahlian" class="form-label">Pilih Keahlian</label>
                                <select class="form-select" id="keahlian" onChange="updateKeahlian()">
                                    <option value="" selected>-- Pilih Keahlian --</option>
                                    <?php foreach($data['keahlian'] as $keahlian): ?>
                                        <option value="<?= $keahlian['id'] ?>"><?= $keahlian['namaKeahlian'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <!-- <div class="col-md-4">
                                <label for="tanggalPemesanan" class="form-label">Tanggal Pemesanan</label>
                                <input type="date" class="form-control" id="tanggalPemesanan" name="tanggalPemesanan" required>
                            </div> -->
                            <div class="col-md-4">
                                <label for="tourGuide" class="form-label">Pilih Tour Guide</label>
                                <select class="form-select" id="tourGuide" onChange="updateGuide()">
                                    <option value="" selected>-- Pilih Tour Guide --</option>
                                    <?php foreach($data['guide'] as $guide): ?>
                                        <option value="<?= $guide['id'] ?>"><?= $guide['guideName'] ?> (Rating <?= $guide['guideRating'] ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card border border-0 shadow-lg">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="" alt="Guide 2" class="img-fluid rounded" id="guideImage">
                                </div>
                                <div class="col-md-9">
                                    <h4 id="guideName"></h4>
                                    <p><strong>Rating:</strong> <span id="guideRating"></span></p>
                                    <p><strong>Keahlian:</strong> <span id="guideKeahlian"></span></p>
                                    <p><strong>Bio:</strong> <span id="guideBio"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container modal-footer d-flex align-items-center border border-0">
                        <button class="btn btn-primary" data-bs-dismiss="modal" id="btnSelanjutnya" data-id="" disabled>Selanjutnya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Pemesanan Paket -->
<div class="modal fade" id="pesanPaketPenyelaman" tabindex="-1" aria-labelledby="pesanPaketPenyelaman" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="pesanPaketPenyelaman">Pesan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="pesanPaketPenyelam">
                    <input type="hidden" name="idPaket" id="idPaket">
                    <input type="hidden" name="guideId" id="guideId">
                    <input type="hidden" name="keahlianId" id="keahlianId">
                    <div class="mb-3">
                        <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control border border-dark" id="namaLengkap"
                            name="namaLengkap" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control border border-dark" id="email" name="email" value="<?= isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tanggalPemesanan" class="form-label">Tanggal Pemesanan</label>
                        <input type="date" class="form-control border border-dark" id="tanggalPemesanan" name="tanggalPemesanan" required>
                    </div>
                    <div class="mb-3">
                        <label for="jmlPeserta" class="form-label">Jumlah Peserta</label>
                        <input type="number" class="form-control border border-dark" id="jmlPeserta" name="jmlPeserta" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Lanjut</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Menampilkan Pesan Kesalahan -->
<div class="modal fade" id="error" aria-hidden="true" aria-labelledby="errorLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="errorLabel">Pemberitahuan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#error" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal untuk Menampilkan Pesan Success -->
<div class="modal fade" id="success" aria-hidden="true" aria-labelledby="successLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="successLabel">Pemberitahuan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#success" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>