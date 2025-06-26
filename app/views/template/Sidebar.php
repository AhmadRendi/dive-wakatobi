<?php if ($_SESSION['user_role'] == "ADMIN") : ?>
<!-- <div class="sidebar">
  <ul class="sidebar-menu mt-4">
    <li><a class="nav-link" href="<?= BASEURL ?>/Dashboard">Dashboard</a></li>
    <li><a class="nav-link" href="<?= BASEURL ?>/Pemesanan">Pesanan Paket</a></li>
    <li><a class="nav-link" href="<?= BASEURL ?>/Paket">Paket Penyelaman</a></li>
    <li><a class="nav-link" href="<?= BASEURL ?>/Kursus">Paket Kursus</a></li>
    <li><a class="nav-link" href="<?= BASEURL ?>/Pembayaran">Pembayaran</a></li>
    <li><a class="nav-link" href="<?= BASEURL ?>/Laporan">Laporan</a></li>
    <li><a class="nav-link" href="<?= BASEURL ?>/Message">Message</a></li>
    <li><a class="nav-link" href="<?= BASEURL ?>/Login/Logout">Logout</a></li>
  </ul>
</div> -->

<!-- SIDEBAR ADMIN (untuk halaman admin) -->
<div class="admin-sidebar">
  <!-- Admin Header -->
  <div class="admin-sidebar-header">
    <div class="admin-avatar">
      <i class="fas fa-user-shield"></i>
    </div>
    <h4>Admin Panel</h4>
    <p>Wakatobi Dive Trip</p>
  </div>

  <!-- Admin Menu -->
  <ul class="admin-sidebar-menu">
    <li class="<?= (strpos($_SERVER['REQUEST_URI'], '/Dashboard') !== false) ? 'active' : '' ?>">
      <a href="<?= BASEURL ?>/Dashboard">
        <span>Dashboard</span>
      </a>
    </li>
    
    <li class="<?= (strpos($_SERVER['REQUEST_URI'], '/Pemesanan') !== false) ? 'active' : '' ?>">
      <a href="<?= BASEURL ?>/Pemesanan">
        <span>Pesanan Paket</span>
      </a>
    </li>
    
    <li class="<?= (strpos($_SERVER['REQUEST_URI'], '/Paket') !== false) ? 'active' : '' ?>">
      <a href="<?= BASEURL ?>/Paket">
        <span>Paket Penyelaman</span>
      </a>
    </li>
    
    <li class="<?= (strpos($_SERVER['REQUEST_URI'], '/Kursus') !== false) ? 'active' : '' ?>">
      <a href="<?= BASEURL ?>/Kursus">
        <span>Paket Kursus</span>
      </a>
    </li>
    
    <li class="<?= (strpos($_SERVER['REQUEST_URI'], '/Pembayaran') !== false) ? 'active' : '' ?>">
      <a href="<?= BASEURL ?>/Pembayaran">
        <span>Pembayaran</span>
      </a>
    </li>
    
    <li class="<?= (strpos($_SERVER['REQUEST_URI'], '/Laporan') !== false) ? 'active' : '' ?>">
      <a href="<?= BASEURL ?>/Laporan">
        <span>Laporan</span>
      </a>
    </li>
    
    <li class="<?= (strpos($_SERVER['REQUEST_URI'], '/Message') !== false) ? 'active' : '' ?>">
      <a href="<?= BASEURL ?>/Message">
        <span>Message</span>
      </a>
    </li>
    
    <li class="<?= (strpos($_SERVER['REQUEST_URI'], '/Login/Logout') !== false) ? 'active' : '' ?>">
      <a href="<?= BASEURL ?>/Login/Logout">
        <span>Logout</span>
      </a>
    </li>
  </ul>
</div>

<?php endif; ?>

<?php if ($_SESSION['user_role'] == null || $_SESSION['user_role'] == "USER") : ?>
<!-- <nav class="navbar shadow navbar-expand-lg">
  <div class="container-fluid justify-content-center">
    <div class="p-1">
      <img src="<?= BASEURL;?>/img/asset/<?= "logo.jpg";?>" alt="" class="rounded-circle ms-2"
      style="width: 60px; height: 60px;">
    </div>
    <h5>Wakatobi Dive Trip</h5>
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
            <a class="nav-link" href="<?= BASEURL ?>/Riwayat">Riwayat Pemesanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASEURL ?>/Login/Logout">Logout</a>
          </li>
          <li class="nav-item">
            <a href="<?= BASEURL ?>/Profile" class="ms-2">
              <img src="<?= BASEURL;?>/img/asset/<?= $_SESSION['picture'] ;?>" class="rounded-circle ms-2" alt="Profile"
                style="width: 30px; height: 30px;">
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav> -->

<!-- NAVBAR USER (untuk halaman user) -->

<nav class="navbar shadow navbar-expand-lg">
  <div class="container-fluid justify-content-between">
    <div class="d-flex align-items-center">
      <div class="p-1">
        <img src="<?= BASEURL;?>/img/asset/<?= "logo.jpg";?>" alt="Wakatobi Logo" class="rounded-circle ms-2"
        style="width: 60px; height: 60px;">
      </div>
      <h5 class="ms-3 mb-0">Wakatobi Dive Trip</h5>
    </div>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?= (strpos($_SERVER['REQUEST_URI'], '/Home') !== false || $_SERVER['REQUEST_URI'] == '/' || basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active glow' : '' ?>" 
             href="<?= BASEURL ?>/Home">
            <i class="fas fa-home"></i>
            Home
          </a>
        </li>
        
        <?php if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] == null) : ?>
          <li class="nav-item">
            <a class="nav-link <?= (strpos($_SERVER['REQUEST_URI'], '/TentangKami') !== false) ? 'active glow' : '' ?>" 
               href="<?= BASEURL ?>/TentangKami">
              <i class="fas fa-info-circle"></i>
              Tentang Kami
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= (strpos($_SERVER['REQUEST_URI'], '/Kegiatan') !== false) ? 'active glow' : '' ?>" 
               href="<?= BASEURL ?>/Kegiatan">
              <i class="fas fa-calendar-alt"></i>
              Kegiatan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= (strpos($_SERVER['REQUEST_URI'], '/Tujuan') !== false) ? 'active glow' : '' ?>" 
               href="<?= BASEURL ?>/Tujuan">
              <i class="fas fa-map-marker-alt"></i>
              Tujuan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= (strpos($_SERVER['REQUEST_URI'], '/HubungiKami') !== false) ? 'active glow' : '' ?>" 
               href="<?= BASEURL ?>/HubungiKami">
              <i class="fas fa-phone"></i>
              Hubungi Kami
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= (strpos($_SERVER['REQUEST_URI'], '/Login') !== false) ? 'active glow' : '' ?>" 
               href="<?= BASEURL ?>/Login">
              <i class="fas fa-sign-in-alt"></i>
              Login
            </a>
          </li>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "USER") : ?>
          <li class="nav-item">
            <a class="nav-link <?= (strpos($_SERVER['REQUEST_URI'], '/Penyelam') !== false) ? 'active glow' : '' ?>" 
               href="<?= BASEURL ?>/Penyelam">
              <i class="fas fa-swimming-pool"></i>
              Paket Penyelaman
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= (strpos($_SERVER['REQUEST_URI'], '/Kursus') !== false) ? 'active glow' : '' ?>" 
               href="<?= BASEURL ?>/Kursus">
              <i class="fas fa-book-open"></i>
              Paket Kursus
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= (strpos($_SERVER['REQUEST_URI'], '/Riwayat') !== false) ? 'active glow' : '' ?>" 
               href="<?= BASEURL ?>/Riwayat">
              <i class="fas fa-history"></i>
              Riwayat Pemesanan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= (strpos($_SERVER['REQUEST_URI'], '/Login/Logout') !== false) ? 'active glow' : '' ?>" 
               href="<?= BASEURL ?>/Login/Logout">
              <i class="fas fa-sign-out-alt"></i>
              Logout
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= BASEURL ?>/Profile" class="nav-link p-1">
              <img src="<?= BASEURL;?>/img/asset/<?= $_SESSION['picture'] ;?>" 
                   class="rounded-circle" alt="Profile"
                   style="width: 35px; height: 35px;">
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<?php endif; ?>