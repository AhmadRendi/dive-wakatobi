<div class="main-content">
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
                            <?php foreach($data['orders'] as $index => $order): ?>
                                <tr>
                                    <td>
                                        <h6>
                                            <?php echo $index + 1; ?>
                                        </h6>
                                    </td>
                                    <td>
                                        <h6>
                                            <?php echo htmlspecialchars($order['tourist']); ?>
                                        </h6>
                                    </td>
                                    <td>
                                        <h6>
                                            <?php echo htmlspecialchars($order['date']); ?>
                                        </h6>
                                    </td>
                                    <td>
                                        <h6>
                                            <?php echo htmlspecialchars($order['package']); ?>
                                        </h6>
                                    </td>
                                    <td>
                                        <h6>
                                            <?php echo htmlspecialchars($order['status']); ?>
                                        </h6>
                                    </td>
                                    <td class="table-actions">
                                        <a href="" data-bs-target="#exampleModal" data-bs-toggle="modal"
                                         class="btn btn-primary btn-sm" data-id="">Lihat</a>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>