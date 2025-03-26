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
        <div class="card mb-4">
            <div class="card-body shadow p-3 bg-body rounded">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title">Pengelolaan Pembayaran</h5>
                </div>
                <div class="table-responsive">
                    <table id="data_table" class="display" style="width:100%">
                        <thead style="background-color:rgb(15, 60, 225); color:white;">
                            <tr>
                                <th>No</th>
                                <th>Nama Wisata</th>
                                <th>Paket</th>
                                <th>Metode Pembayaran</th>
                                <th>Status Pembayaran</th>
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
                                        <?php echo htmlspecialchars($order['nama']); ?>
                                    </h6>
                                </td>
                                <td>
                                    <h6>
                                        <?php echo htmlspecialchars($order['namaPaket']); ?>
                                    </h6>
                                </td>
                                <td>
                                    <h6>
                                        <?php echo htmlspecialchars($order['metodePembayaran']); ?>
                                    </h6>
                                </td>
                                <td>
                                    <h6>
                                        <?php echo htmlspecialchars($order['statusPembayaran']); ?>
                                    </h6>
                                </td>
                                <td class="table-actions">
                                    <a href="" data-bs-target="#verifikasi" data-bs-toggle="modal"
                                        class="btn bg-warning btn-sm" data-id="">Verifikasi</a>
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


<!-- Verifikasi Confirmation Modal -->
<div class="modal fade" id="verifikasi" tabindex="-1" aria-labelledby="verifikasiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verifikasiLabel">Konfirmasi Verifikasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Yakin ingin Memverifikasi dokumen ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="confirmVerification">Verifikasi</button>
            </div>
        </div>
    </div>
</div>