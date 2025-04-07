<div class="main-content">
    <div class="header mb-4 d-flex justify-content-between align-items-center">
        <?php if ($_SESSION['user_role'] == "ADMIN") : ?>
            <h4 class="m-0">Panel ADMIN</h4>
            <div class="d-flex align-items-center">
                <span class="me-2">
                    <?= $_SESSION['name_user']?>
                </span>
                <span class="text-muted small">
                    <?= $_SESSION['position']?>
                </span>
                <img src="<?= BASEURL;?>/img/asset/image.png" class="rounded-circle ms-2" alt="Profile"
                    style="width: 40px; height: 40px;">
            </div>
        <?php endif; ?>
    </div>

    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-body shadow p-3 bg-body rounded">
                <div class="profile-container">
                    <h2 class="text-center mb-4">Profil</h2>

                    <div class="profile-image">
                        <img src="<?= BASEURL;?>/img/asset/image.png" class="rounded-circle ms-2" alt="Profile"
                        style="width: 150px; height: 150px;">
                        <!-- <span>150 x 150</span> -->
                        <button class="edit-button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil" viewBox="0 0 16 16">
                                <path
                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                            </svg>
                        </button>
                    </div>

                    <form action="" method="">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="fullName" class="form-label">Nama Lengkap</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="fullName" name="fullName"
                                    value="<?= $data['fullName'] ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="email" class="form-label">E-mail</label>
                            </div>
                            <div class="col-md-8">
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?= $data['email'] ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="nmrTelepon" class="form-label">Nomor Telepon</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="nmrTelepon" name="nmrTelepon"
                                    value="<?= $data['nmrTelepon'] ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="password" class="form-label">Kata sandi</label>
                            </div>
                            <div class="col-md-8">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="[Kata sandi tersimpan]">
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn save-button">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>