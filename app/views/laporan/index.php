<div class="main-content">
    <div class="header mb-4 d-flex justify-content-between align-items-center">
        <h4 class="m-0">Panel ADMIN</h4>
        <div class="d-flex align-items-center">
            <a href="<?= BASEURL ?>/Profile" class="ms-2">
                <img src="<?= BASEURL;?>/img/asset/<?= $_SESSION['picture'] ; ?>r" class="rounded-circle ms-2" alt="Profile"
                style="width: 40px; height: 40px;">
            </a>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card border border-0 shadow-lg">
            <div class="card-body  p-3 bg-body rounded">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title">Pengelolaan Laporan</h5>
                </div>
                <div class="card border border-0" style="width: 50%;">
                    <div class="input-group align-items-center d-grid gap-4 d-md-flex justify-content-md-end"> 
                        <label class="form-label mt-2">Filter Berdasarkan Tanggal</label>
                        <input type="date" class="form-control rounded"  placeholder="Select Date" aria-label="Select Date">
                        <input type="date" class="form-control rounded"  placeholder="Select Date" aria-label="Select Date">
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="table_datatables" class="display" style="width:100%">
                        <thead style="background-color:rgb(15, 60, 225); color:white;">
                            <tr>
                                <th>No</th>
                                <th>ID Pemesanan</th>
                                <th>Nama Wisatawan</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Status Pembayaran</th>
                                <th>Total Pembayaran</th>
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
                                        <?php echo htmlspecialchars($order['id']); ?>
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
                                        <?php echo htmlspecialchars($order['status']); ?>
                                    </h6>
                                </td>
                                <td>
                                    <h6>
                                        <?php echo htmlspecialchars($order['harga']); ?>
                                    </h6>
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