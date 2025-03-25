<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4">Registrasi Wisatawan</h2>
                    <form action="" method="">
                    <div class="mb-3">
                    <label for="fullName" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Masukkan nama lengkap" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Buat username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Buat password" required>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Konfirmasi password" required>
                </div>
                <div class="d-grid mt-4">
                <div class="justify-content-center d-flex">
                    <button type="submit" class="btn btn-primary me-2">Daftar</button> <!-- Add margin-end -->
                    <button type="reset" class="btn btn-danger">Batal</button>
                </div>
                </div>
                    </form>
                    <div class="auth-links mt-3">
                        <p class="form-label">Sudah punya akun? <a href="<?= BASEURL ;?>/Login">Login sekarang</a></p>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>