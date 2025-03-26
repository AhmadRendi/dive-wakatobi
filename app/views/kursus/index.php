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
                                        <?php echo htmlspecialchars($order['namaKursus']); ?>
                                    </h6>
                                </td>
                                <td>
                                    <h6>
                                        <?php echo htmlspecialchars($order['deskripsi']); ?>
                                    </h6>
                                </td>
                                <td>
                                    <h6>
                                        <?php echo htmlspecialchars($order['harga']); ?>
                                    </h6>
                                </td>
                                <td class="table-actions">
                                    <a href="" data-bs-target="#editKursus" data-bs-toggle="modal"
                                        class="btn bg-warning btn-sm" data-id="">Edit</a>
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


<!-- Modal Edit Jadwal -->
<div class="modal fade" id="editKursus" tabindex="-1" aria-labelledby="editKursusLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editKursusLabel">Edit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="" method="post">
                    <input type="hidden" name="id" id="editId">
                    <div class="mb-3">
                        <label for="editNamaKursus" class="form-label">Nama Kursus</label>
                        <input type="text" class="form-control border border-dark" id="editNamaKursus"
                            name="editNamaKursus" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="editDeskripsi" class="form-label">Deskripsi</label>
                        <textarea type="textarea" class="form-control border border-dark" id="editDeskripsi"
                            name="editDeskripsi" required> </textarea>
                        <!-- <textarea class="form-control" aria-label="With textarea"></textarea> -->
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
                <form id="" method="post">
                    <div class="mb-3">
                        <label for="namaKursus" class="form-label">Nama Kursus</label>
                        <input type="text" class="form-control border border-dark" id="namaKursus" name="namaKursus"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control border border-dark" id="deskripsi" name="deskripsi"
                            required> </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control border border-dark" id="harga" name="harga" required>
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