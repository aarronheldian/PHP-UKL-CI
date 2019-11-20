<?php include 'V_header.php'; ?>
<html>
<body>
  <div class="parallax-container">
    <div class="parallax"><img src="<?=base_url()?>assets/img/yellow.png"></div>
    <div class="container efek">
      <div class="row">
        <div class="col m2 push-m4"><img width=300px src="<?=base_url()?>assets/img/logo.png"></div>
      </div>

      <h2 class="center light white-text">Selamat Datang!</h2>
    </div>
  </div>

  <!-- MENU USER -->

  <?php if ($_SESSION['level'] == "user") : ?>
  <section id="about" class="grey lighten-3 scrollspy">
    <div class="container">
      <div class="row mb-4">
        <div class>
          <h3 class="center">Tentang "NGAMPIL"</h2>
        </div>
      </div>

      <div class="row justify-content-center  ">
        <div class="col-md-5 text-center">
          <p> "Ngampil Online" adalah sebuah situs peminjaman barang Inventaris SARPRA SMK TELKOM MALANG. Sasaran
            pengguna nya yaitu warga SMK TELKOM MALANG, Seluruh
            warga sekolah dapat menggunakan web ini. Web ini dibuat untuk memudahkan Warga sekolah untuk meminjam barang
            yang menjadi Inventaris SARPRA, seperti : LCD, Kabel VGA atau apapun yang terdapat pada Inventaris SARPRA
            SMK TELKOM MALANG. </p>
        </div>
        <div class="col-md-5 text-center">
          <p> Untuk meminjam anda bisa mengklik tombol "PINJAM BARANG" dibawah, lalu mengisi Form Pinjam Barang. Untuk
            melihat
            data barang yang terpinjam anda bisa mengklik "DATA PINJAM BARANG" didalamnya terdapat data lengkap
            mulai dari peminjam, tanggal pinjam, tanggal kembali, status barang </p>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>



  <section id="pengajuan" >
    <div class="container">
      <div class="row">
    <?php if ($_SESSION['level'] == "user") : ?>
        <div class="card-panel col m6 pull-m1 center pilih">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="<?=base_url()?>assets/img/parallax.png">
          </div>
          <div class="card-content">
            <p><a href="<?= base_url('C_peminjaman') ?>" class="waves-effect waves-light btn cyan">PINJAM BARANG</a></p>
          </div>
        </div>
    <?php endif; ?>
    <?php if ($_SESSION['level'] == "admin") : ?>
        <div class="card-panel col m6 push-m1 center pilih">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="<?=base_url()?>assets/img/header-bg.jpg">
          </div>
          <div class="card-content">
            <p><a href="<?= base_url('C_peminjaman') ?>" class="waves-effect waves-light btn cyan">DATA PINJAM BARANG</a></p>
          </div>
        </div>
    <?php endif; ?>
      </div>
    </div>
  </section>

<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="<?=base_url()?>assets/js/materialize.min.js"></script>
<script>
  const sideNav = document.querySelectorAll('.sidenav');
  M.Sidenav.init(sideNav);
  const parallax = document.querySelectorAll('.parallax');
  M.Parallax.init(parallax);
  const scroll = document.querySelectorAll('.scrollspy');
  M.ScrollSpy.init(scroll, {
    scrollOffset: 50
  })
</script>

<?php include 'V_footer.php'; ?>

