<?php if ($_SESSION['user_role'] == "ADMIN" || $_SESSION['user_role'] == "USER") : ?>
  <div class="sidebar">
    <ul class="sidebar-menu mt-4">
        <li><a class="nav-link" href="<?= BASEURL ?>/Dashboard">Dashboard</a></li>
        <li><a class="nav-link" href="">Pemesanan Paket Penyelaman</a></li>
        <li><a class="nav-link" href="">Pengelolaan Jadwal Penyelaman</a></li>
        <li><a class="nav-link" href="">Pengelolaan Wisata</a></li>
        <li><a class="nav-link" href="">Pembayaran</a></li>
        <li><a class="nav-link" href="">Laporan</a></li>
        <!-- <li><a class="nav-link" href="<?= BASEURL ?>/Profile" arial-disable=true>Profil</a></li> -->
        <li><a class="nav-link" href="<?= BASEURL ?>/Login/Logout">Logout</a></li>
    </ul>
</div>
<?php endif; ?>

<?php if ($_SESSION['user_role'] == null || $_SESSION['user_role'] == null) : ?>
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
        <!-- <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li> -->
      </ul>
    </div>
  </div>
</nav>
<?php endif; ?>