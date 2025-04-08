<div class="main-content">
    <div class="header mb-4 d-flex justify-content-between align-items-center">
        <h4 class="m-0">Panel ADMIN</h4>
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
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title">Pengelolaan Pemesanan</h5>
                </div>
                <div class="table-responsive">
                    <table id="data_table" class="display" style="width:100%">
                        <thead style="background-color:rgb(15, 60, 225); color:white;">
                            <tr>
                                <th>No</th>
                                <th>Nama Wisatawan</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Paket</th>
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
                                    </h6>
                                </td>
                                <td>
                                    <h6>
                                        <?php echo htmlspecialchars($order['namaLengkap']); ?>
                                    </h6>
                                </td>
                                <td>
                                    <h6>
                                        <?php echo htmlspecialchars($order['tanggalPemesanan']); ?>
                                    </h6>
                                </td>
                                <td>
                                    <h6>
                                        <?php echo htmlspecialchars($order['namaPaket']); ?>
                                    </h6>
                                </td>
                                <td>
                                    <h6>
                                        <?php echo htmlspecialchars($order['status']); ?>
                                    </h6>
                                </td>
                                <td class="table-actions">
                                    <button class="btn btn-primary btn-sm lihatDetailPemesanan"
                                        data-id="<?= $order['id']; ?>">Lihat</button>
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


<!-- Modal -->
<div class="modal fade" id="lihatDetail" tabindex="-1" aria-labelledby="lihatDetail" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="lihatDetail">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="" method="post">
                    <input type="hidden" name="id" id="editId">
                    <div class="mb-3">
                        <label for="detailNamaWisatawan" class="form-label">Nama Wisatawan</label>
                        <input type="text" class="form-control border border-dark" id="detailNamaWisatawan"
                            name="detailNamaWisatawan" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tanggalPemesanan" class="form-label">Tanggal Pemesanan</label>
                        <input type="textarea" class="form-control border border-dark" id="tanggalPemesanan"
                            name="tanggalPemesanan" readonly>
                        <!-- <textarea class="form-control" aria-label="With textarea"></textarea> -->
                    </div>
                    <div class="mb-3">
                        <label for="namaPaket" class="form-label">Paket</label>
                        <input type="text" class="form-control border border-dark" id="namaPaket" name="namaPaket" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control border border-dark" id="status" name="status" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="jumlahPeserta" class="form-label">Jumlah Peserta</label>
                        <input type="text" class="form-control border border-dark" id="jumlahPeserta"
                            name="jumlahPeserta" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control border border-dark" id="harga" name="harga" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <!-- <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>