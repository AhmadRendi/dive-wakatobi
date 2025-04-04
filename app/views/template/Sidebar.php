<?php if ($_SESSION['user_role'] == "ADMIN") : ?>
<div class="sidebar">
  <ul class="sidebar-menu mt-4">
    <li><a class="nav-link" href="<?= BASEURL ?>/Dashboard">Dashboard</a></li>
    <li><a class="nav-link" href="<?= BASEURL ?>/Pemesanan">Pemesanan Paket Penyelaman</a></li>
    <li><a class="nav-link" href="<?= BASEURL ?>/Paket">Pengelolaan Paket Penyelaman</a></li>
    <li><a class="nav-link" href="<?= BASEURL ?>/Kursus">Pengelolaan Kursus</a></li>
    <li><a class="nav-link" href="<?= BASEURL ?>/Pembayaran">Pembayaran</a></li>
    <li><a class="nav-link" href="<?= BASEURL ?>/Laporan">Laporan</a></li>
    <li><a class="nav-link" href="<?= BASEURL ?>/Login/Logout">Logout</a></li>
  </ul>
</div>
<?php endif; ?>

<?php if ($_SESSION['user_role'] == null || $_SESSION['user_role'] == "USER") : ?>
<nav class="navbar shadow navbar-expand-lg">
  <div class="container-fluid justify-content-center">
    <h3>Wakatobi Dive Trip</h3>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= BASEURL ?>/Home">Home</a>
        </li>
        
        <?php if ($_SESSION['user_role'] == null) : ?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= BASEURL ?>/TentangKami">Tentang Kami</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASEURL ?>/Kegiatan">Kegiatan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASEURL ?>/Tujuan">Tujuan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASEURL ?>/HubungiKami">Hubungi Kami</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASEURL ?>/Login">Login</a>
          </li>
        <?php endif; ?>
        <?php if ($_SESSION['user_role'] == "USER") : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASEURL ?>/Penyelam">Peket Penyelaman</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASEURL ?>/Kursus">Paket Kursus</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASEURL ?>/Login/Logout">Logout</a>
          </li>
          <li class="nav-item">
            <a href="<?= BASEURL ?>/Profile" class="ms-2">
              <img src="<?= BASEURL;?>/img/asset/image.png" class="rounded-circle ms-2" alt="Profile"
                style="width: 40px; height: 40px;">
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<?php endif; ?>