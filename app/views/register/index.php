<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4">Registrasi Wisatawan</h2>
                    <form id="registerForm">
                        <div class="mb-3">
                            <label for="fullName" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="fullName" name="fullName"
                                placeholder="Masukkan nama lengkap" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Masukkan email" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Buat username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Buat password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                                placeholder="Konfirmasi password" required>
                        </div>
                        <div class="d-grid mt-4">
                            <div class="justify-content-center d-flex">
                                <button type="reset" class="btn btn-danger me-2">Batal</button>
                                <button type="submit" class="btn btn-primary">Daftar</button>
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

<!-- Modal untuk Menampilkan Pesan Kesalahan -->
<div class="modal fade" id="errorRegistration" aria-hidden="true" aria-labelledby="errorRegistrationLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="errorRegistrationLabel">Pemberitahuan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#errorRegistration" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal untuk Menampilkan Pesan Success -->
<div class="modal fade" id="successRegister" aria-hidden="true" aria-labelledby="successRegisterLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="successRegisterLabel">Pemberitahuan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#successRegister" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>