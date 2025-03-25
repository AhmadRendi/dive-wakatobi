<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4">Login Wisata</h2>
                    <form action="<?= BASEURL ?>/Login/session" method="">
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