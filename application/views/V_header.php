<html>
<head>
  <title>Dashboard</title>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/materialize.min.css" media="screen,projection" />

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style type="text/css">
    .parallax-container {
      height: 630px;
    }

    .efek {
      text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
    }

    section,
    footer {
      padding: 20px 0px;
      opacity: 0.8;
    }

    .pilih img {
      margin-top: 10px;
      width: 100%;
    }

    .card-panel {
      margin-top: 40px;
    }

    body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
    }

    main {
    flex: 1 0 auto;
    }
      
  </style>

</head>

<body id="home" class="scrollspy">

  <div class="navbar-fixed">
    <nav class="#ffb300 amber darken-1">

      <div class="nav-wrapper">
        <a href="#" data-target="sidenav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <div class="container">
          <a href="<?=base_url('C_home')?>" class="brand-logo">Ngampil</a>
        </div>
        <ul class="right hide-on-med-and-down">
          <li><a href="<?= base_url('C_inventaris') ?>" >Daftar Barang</a></li>
          <?php if ($_SESSION['level'] == "user") : ?>
          <li><a href="<?= base_url('C_peminjaman') ?>">Pengajuan</a></li>
          <li><a href="#about">Tentang</a></li>
          <?php endif; ?>
          <?php if ($_SESSION['level'] == "admin") : ?>
          <li><a href="<?= base_url('C_pengguna') ?>" >Daftar User</a></li>
          <li><a href="<?= base_url('C_peminjaman') ?>" >Daftar Peminjaman</a></li>
          <?php endif; ?>
          <li><a href="<?= base_url('C_login/logout') ?>" class="waves-effect waves-grey btn white black-text">Keluar</a></li>
        </ul>
      </div>
  </div>
  </nav>
  </div>

  <ul class="sidenav black-text" id="sidenav">
    <li style="margin-top:10px;" class="center"><img width=20% src="<?=base_url()?>assets/img/logo.png"></li>
    <li class="active" ><a href="<?= base_url('C_inventaris') ?>" >Daftar Barang</a></li>
    <li>
      <div class="divider"></div>
    </li>
    <?php if ($_SESSION['level'] == "user") : ?>
    <li>
      <div class="divider"></div>
    </li>
    <li><a href="<?= base_url('C_peminjaman') ?>">Pengajuan</a></li>
    <?php endif; ?>
    <?php if ($_SESSION['level'] == "admin") : ?>
    <li>
      <div class="divider"></div>
    </li>
    </li>
    <li><a href="<?= base_url('C_pengguna') ?>" >Daftar User</a></li>
    <li>
      <div class="divider"></div>
    </li>
    <li><a href="<?= base_url('C_peminjaman') ?>" >Daftar Peminjaman</a></li>
    <li>
      <div class="divider"></div>
    </li>
    <?php endif; ?>
  </ul>
  
</html>