<div class="container my-5">
    <div class="row">
        <div class="col-md-12 text-center mb-4">
            <h2>Riwayat Pemesanan</h2>
        </div>
    </div>

    <div class="container-fluid ">
        <div class="card mb-4 border border-0 shadow-lg">
            <div class="card-body shadow p-3 bg-body rounded">
            <div class="table-responsive">
                <table id="data_table" class="display" style="width:100%">
                        <thead style="background-color:rgb(15, 60, 225); color:white;">
                            <tr>
                                <th>No</th>
                                <th>Nama Paket</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $index => $order): ?>
                            <tr>
                                <td>
                                    <h6>
                                        <?php echo $index + 1; ?>
                                        <!-- <?php echo htmlspecialchars($order['id']); ?> -->
                                    </h6>
                                </td>
                                <td>
                                    <h6>
                                        <?php echo htmlspecialchars($order['namaPaket']); ?>
                                    </h6>
                                </td>
                                <td>
                                    <h6>
                                        <?php echo htmlspecialchars($order['tanggalPemesanan']); ?>
                                    </h6>
                                </td>
                                <td>
                                    <h6>
                                        <?php echo htmlspecialchars($order['status']); ?>
                                    </h6>
                                </td>
                                <td class="table-actions">
                                    <?php if ($order['status'] == 'Menunggu Pembayaran'): ?>
                                        <button class="btn btn-danger btn-sm batalPesanan" data-id="<?= $order['id']; ?>">Batal</button>
                                        <button class="btn btn-primary btn-sm bayarPesanan" data-id="<?= $order['id']; ?>">Bayar</button>
                                    <?php else: ?>
                                        <button class="btn btn-secondary btn-sm" disabled>Batal</button>
                                        <button class="btn btn-secondary btn-sm" disabled>Bayar</button>
                                    <?php endif; ?>
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

<!-- Modal untuk Menampilkan Konfirmasi Pembatalan Pesanan -->
<div class="modal fade" id="confirm" aria-hidden="true" aria-labelledby="confirmLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="confirmLabel">Pemberitahuan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formBatalPesanan">
          <input type="hidden" name="id" id="id">
            <p>Apakah Anda yakin ingin membatalkan pemesanan ini?</p>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" data-bs-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Ya</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
