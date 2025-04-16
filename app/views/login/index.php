<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4">Login Wisata</h2>
                    <form  id="login_form">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                    <div class="auth-links mt-3">
                        <p class="form-label">Belum punya akun? <a href="<?= BASEURL ;?>/Register">Daftar sekarang</a></p>
                        <p><a href="">Lupa password?</a></p>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Menampilkan Pesan Kesalahan -->
<div class="modal fade" id="errorLogin" aria-hidden="true" aria-labelledby="errorLoginLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="errorLoginLabel">Pemberitahuan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#errorLogin" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>