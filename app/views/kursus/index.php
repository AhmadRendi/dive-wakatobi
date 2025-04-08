<?php if($_SESSION['user_role'] == "ADMIN"): ?>
    <div class="main-content overflow-y-visible">
        <div class="header mb-4 d-flex justify-content-between align-items-center">
            <h4 class="m-0">Panel ADMIN</h4>
            <div class="d-flex align-items-center">
                <span class="me-2">
                    <?= $_SESSION['name_user']?>
                </span>
                <span class="text-muted small">
                    <?= $_SESSION['position']?>
                </span>
                <a href="<?= BASEURL ?>/Profile" class="ms-2">
                    <img src="<?= BASEURL;?>/img/asset/image.png" class="rounded-circle ms-2" alt="Profile"
                    style="width: 40px; height: 40px;">
                </a>
            </div>
        </div>

        <div class="container-fluid">
            <div class="card mb-4 border border-0 shadow-lg">
                <div class="card-body shadow p-3 bg-body rounded">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title">Pengelolaan Kursus</h5>
                    </div>
                    <button class="btn btn-success rounded border border-none" data-bs-toggle="modal"
                        data-bs-target="#addKursus">Tambahkan Kursus</button>
                    <div class="table-responsive">
                        <table id="data_table" class="display" style="width:100%">
                            <thead style="background-color:rgb(15, 60, 225); color:white;">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kursus</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data as $index => $order): ?>
                                <tr>
                                    <td>
                                        <h6>
                                            <?php echo $index + 1; ?>
                                        </h6>
                                    </td>
                                    <td>
                                        <h6>
                                            <?php echo htmlspecialchars($order['namaPaket']); ?>
                                        </h6>
                                    </td>
                                    <td>
                                        <h6>
                                            <?php echo htmlspecialchars($order['deskripsi']); ?>
                                        </h6>
                                    </td>
                                    <td>
                                        <h6> Rp
                                            <?= number_format($order['harga'], 0, ',', '.') ?>
                                        </h6>
                                    </td>
                                    <td class="table-actions">
                                    <button class="btn bg-warning btn-sm editPaket" data-id= <?= $order['id']; ?> >Edit</button>
                                        <a href="" class="btn btn-danger btn-sm" data-id>Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if($_SESSION['user_role'] == "USER"): ?>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12 text-center mb-4">
                <h2>Paket Kursus Wakatobi</h2>
                <p>Pilih paket perjalanan yang sesuai dengan kebutuhan Anda</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <?php if(!empty($data)): ?>
            <?php foreach($data as $package): ?>
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
<?php endif; ?>



<!-- Modal Edit Jadwal -->
<div class="modal fade" id="editPaketMenyelam" tabindex="-1" aria-labelledby="editJadwalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editJadwalLabel">Edit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="" method="post">
                    <input type="hidden" name="id" id="editId">
                    <div class="mb-3">
                        <label for="editNamaPaket" class="form-label">Nama Paket</label>
                        <input type="text" class="form-control border border-dark" id="editNamaPaket"
                            name="editNamaPaket" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="editDeskripsi" class="form-label">Deskripsi</label>
                        <textarea type="textarea" class="form-control border border-dark" id="editDeskripsi"
                            name="editDeskripsi" required> </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editHarga" class="form-label">Harga</label>
                        <input type="text" class="form-control border border-dark" id="editHarga" name="editHarga"
                            required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Penambahan jadwal -->
<div class="modal fade" id="addKursus" tabindex="-1" aria-labelledby="addKursusLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addKursusLabel">Tambah Kursus</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="savePaketKursusForm" method="post">
                    <div class="mb-3">
                        <label for="namaPaket" class="form-label">Nama Kursus</label>
                        <input type="text" class="form-control border border-dark" id="namaPaket" name="namaPaket"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control border border-dark" id="deskripsi" name="deskripsi"
                            required> </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control border border-dark" id="harga" name="harga" required>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control border border-dark" id="foto" name="foto" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
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