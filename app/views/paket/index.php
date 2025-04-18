<div class="main-content overflow-y-visible">
    <div class="header mb-4 d-flex justify-content-between align-items-center">
        <h4 class="m-0"></h4>
        <div class="d-flex align-items-center">
            <a href="<?= BASEURL ?>/Profile" class="ms-2">
                <img src="<?= BASEURL;?>/img/asset/<?= $_SESSION['picture']?>" class="rounded-circle ms-2" alt="Profile"
                style="width: 40px; height: 40px;">
            </a>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card mb-4 border border-0 shadow-lg">
            <div class="card-body shadow p-3 bg-body rounded">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title">Pengelolaan Paket</h5>
                </div>
                <button class="btn btn-success rounded border border-none" data-bs-toggle="modal"
                    data-bs-target="#addJadwal">Tambahkan Paket</button>
                <div class="table-responsive">
                    <table id="data_table" class="display" style="width:100%">
                        <thead style="background-color:rgb(15, 60, 225); color:white;">
                            <tr>
                                <th>No</th>
                                <th>Nama Paket</th>
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
                                            <?= htmlspecialchars($order['namaPaket']); ?>
                                        </h6>
                                    </td>
                                    <td>
                                        <h6>
                                            <?= htmlspecialchars($order['deskripsi']); ?>
                                        </h6>
                                    </td>
                                    <td>
                                        <h6> Rp
                                            <?= number_format($order['harga'], 0, ',', '.') ?>
                                        </h6>
                                    </td>
                                    <td class="table-actions">
                                        <button class="btn bg-warning btn-sm editPaket" data-id= <?= $order['id']; ?> >Edit</button>
                                        <button class="btn btn-danger btn-sm delete" data-id= <?= $order['id']; ?> >Hapus</button>
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
<div class="modal fade" id="editPaketMenyelam" tabindex="-1" aria-labelledby="editJadwalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editJadwalLabel">Edit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editPaketForm">
                    <input type="hidden" name="id" id="editId">
                    <div class="mb-3">
                        <label for="editNamaPaket" class="form-label">Nama Paket</label>
                        <input type="text" class="form-control border border-dark" id="editNamaPaket"
                            name="editNamaPaket" required>
                    </div>
                    <div class="mb-3">
                        <label for="editDeskripsi" class="form-label">Deskripsi</label>
                        <textarea type="textarea" class="form-control border border-dark" id="editDeskripsi"
                            name="editDeskripsi" required> </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editHarga" class="form-label">Harga</label>
                        <input type="number" class="form-control border border-dark" id="editHarga" name="editHarga"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="editWaktu" class="form-label">Waktu</label>
                        <input type="time" class="form-control border border-dark" id="editWaktu" name="editWaktu"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="editLokasi" class="form-label">Lokasi</label>
                        <select class="form-select" name="editLokasi" id="editLokasi" aria-label="Default select example">
                            <option selected>Pilih Lokasi</option>
                            <option value="Wangi-Wangi">Wangi-Wangi</option>
                            <option value="Kaledupa">Kaledupa</option>
                            <option value="Tomia">Tomia</option>
                            <option value="Binongko">Binongko</option>
                        </select required>
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
<div class="modal fade" id="addJadwal" tabindex="-1" aria-labelledby="addJadwalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addJadwalLabel">Tambah Jadwal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="savePaketNyelamForm" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="namaPaket" class="form-label">Nama Paket</label>
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
                        <label for="waktu" class="form-label">Waktu</label>
                        <input type="time" class="form-control border border-dark" id="waktu" name="waktu" required>
                    </div>
                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <select class="form-select" name="lokasi" id="lokasi" aria-label="Default select example">
                            <option selected>Pilih Lokasi</option>
                            <option value="Wangi-Wangi">Wangi-Wangi</option>
                            <option value="Kaledupa">Kaledupa</option>
                            <option value="Tomia">Tomia</option>
                            <option value="Binongko">Binongko</option>
                        </select required>
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