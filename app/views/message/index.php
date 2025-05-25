<!-- Main Content -->
<div class="main-content">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Pesan Hubungi Kami</h2>
            <div class="d-flex">
                <div class="search-box me-2">
                    <i class="fas fa-search"></i>
                    <form action="<?= BASEURL; ?>/Message" method="GET" class="d-inline">
                        <input type="text" class="form-control" name="search" placeholder="Cari pesan..." id="searchInput" value="<?= isset($data['searchQuery']) ? $data['searchQuery'] : ''; ?>">
                    </form>
                </div>
            </div>
        </div>

        <!-- Display success/error messages if any -->
        <?php if (isset($_GET['status_updated']) && $_GET['status_updated'] === 'true'): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Status pesan berhasil diperbarui.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <?php if (isset($_GET['reply_sent']) && $_GET['reply_sent'] === 'true'): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Balasan berhasil dikirim.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <?php if (isset($_GET['message_deleted']) && $_GET['message_deleted'] === 'true'): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Pesan berhasil dihapus.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="stats-card unread">
                    <i class="fas fa-envelope"></i>
                    <h3><?= $data['stats']['unread']; ?></h3>
                    <p class="mb-0">Pesan Belum Dibaca</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-card replied">
                    <i class="fas fa-reply"></i>
                    <h3><?= $data['stats']['read']; ?></h3>
                    <p class="mb-0">Pesan Dibalas</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-card total">
                    <i class="fas fa-comments"></i>
                    <h3><?= $data['stats']['total']; ?></h3>
                    <p class="mb-0">Total Pesan</p>
                </div>
            </div>
        </div>

        <!-- Messages -->
        <div class="row">
            <?php if (empty($data['messages'])): ?>
            <div class="col-12">
                <div class="card p-4 text-center">
                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                    <h4>Tidak ada pesan yang ditemukan</h4>
                    <p class="text-muted">Coba ubah filter atau kriteria pencarian Anda</p>
                </div>
            </div>
            <?php else: ?>
            <?php foreach ($data['messages'] as $message): ?>
            <div class="col-lg-6 mb-4">
                <div class="card message-card <?= $message['status']; ?>" data-bs-toggle="modal" data-bs-target="#messageModal<?= $message['id']; ?>">
                    <div class="card-body">
                        <div class="message-header">
                            <h5 class="card-title mb-0"><?= htmlspecialchars($message['name']); ?></h5>
                            <span class="badge <?= $this->getStatusBadgeClass($message['status']); ?>">
                                <?= $this->translateStatus($message['status']); ?>
                            </span>
                        </div>
                        <h6 class="card-subtitle mb-2 text-muted"><?= htmlspecialchars($message['email']); ?></h6>
                        <div class="message-content">
                            <p class="card-text"><?= htmlspecialchars($message['message']); ?></p>
                        </div>
                        <div class="message-footer">
                            <span class="text-muted"><i class="far fa-clock me-1"></i> <?= $this->formatDate($message['date']); ?></span>
                            <!-- <span class="badge <?= $this->getPriorityBadgeClass($message['priority']); ?>">
                                <?= $this->translatePriority($message['priority']); ?>
                            </span> -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Message Modal -->
            <div class="modal fade" id="messageModal<?= $message['id']; ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detail Pesan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <h4><?= htmlspecialchars($message['name']); ?></h4>
                                    <p class="text-muted mb-0"><?= htmlspecialchars($message['email']); ?></p>
                                </div>
                                <div class="text-end">
                                    <span class="badge <?= $this->getStatusBadgeClass($message['status']); ?> mb-2">
                                        <?= $this->translateStatus($message['status']); ?>
                                    </span>
                                    <p class="text-muted mb-0"><i class="far fa-clock me-1"></i> <?= $this->formatDate($message['date']); ?></p>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-body">
                                    <p><?= nl2br(htmlspecialchars($message['message'])); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <!-- <nav aria-label="Page navigation" class="mt-4">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Sebelumnya</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Selanjutnya</a>
                </li>
            </ul>
        </nav> -->
    </div>
</div>
