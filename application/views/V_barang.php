<?php include 'V_header.php'; ?>

<!DOCTYPE html>
<html>
  <head>
      <title>Ngampil</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style type="text/css">
          .efek {
            text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
          }
          section, footer {
            padding: 50px 0px; 
          }
          .card-panel {
            margin-top: 40px;
          }
          body {
            background-image: url("http://localhost/ukl/assets/img/5.jpg");
            background-size: cover;
          }
          footer {
            margin-top: 145px;
            opacity: 0.8;
          }
          .parallax-container {
            height: 425px;
          }
      </style>


  </head>


  <body>
  
    <section class="">
      <div class="container">
          <h3 class="light center grey-text text-darken-3 efek">DAFTAR BARANG</h3>
          <div class="row card-panel">
          <?php if ($_SESSION['level'] == "admin") : ?>
            <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Tambah Barang</a>
          <?php endif; ?>
            <div class="input-field col m4 s6 right">
              <i class="material-icons prefix">search</i>
              <input id="search" placeholder="search">
              <div class="search-results"></div>
            </div>
            <table class="responsive-table highlight centered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Jenis</th>
                  <th>Deskripsi</th>
                  <th>Jumlah</th>
                  <th>Tanggal Register</th>
                  <?php if ($_SESSION['level'] == "admin") : ?>
                  <th>Opsi</th>
                  <?php endif; ?>                  
                </tr>
              </thead>
              <tbody>
                <?php $no=1; ?>
						    <?php foreach ($inventaris as $x ) : ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $x->nama ?></td>
                  <td><?= $x->nama_jenis ?></td>
                  <td><?= $x->deskripsi ?></td>
                  <td><?= $x->jumlah ?></td>
                  <td><?= $x->tanggal_register ?></td>
							    <?php if ($_SESSION['level'] == "admin") : ?>
                  <td class='text-center'>
                    <a href="<?=base_url('C_inventaris/delete/'). $x->id_inventaris ?>" class="waves-effect waves-light btn amber darken-1">HAPUS</a>
							    </td>
							    	<?php endif; ?>
                </tr>
                <?php $no++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
      </div>
      
      <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true" >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4>Tambah Barang</h4>
              </div>
              <div class="modal-body" >
                <form action="<?= base_url('C_inventaris/add') ?>" method="post">
                    <div class="input-field">
                      <i class="material-icons prefix">storage</i>
                      <input id="nb" type="text" name="nama" required>
                      <label for="nb">Nama Barang</label>
                    </div>
                    <div class="input-field col s12">
                      <select id="id_jenis" class="select" name="id_jenis">
                          <option value="" disabled selected>Jenis</option>
                          <?php foreach ($jenis as $j) : ?>
                          <option value="<?= $j->id_jenis ?>"><?= $j->nama_jenis ?></option>
                          <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="input-field">
                      <i class="material-icons prefix">chevron_right</i>
                      <input id="deskripsi" type="text" name="deskripsi" required>
                      <label for="desk">Deskripsi</label>
                    </div>
                    <div class="input-field row">
                      <i class="material-icons prefix">library_books</i>
                      <input id="jumlah" type="text" name="jumlah" required>
                      <label for="jumlah">Jumlah</label>
                    </div>
              </div>
              <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Batal</a>
              </div>
                </form>
            </div>
          </div>
      </div>

    </section>
  </body>

  <?php include 'V_footer.php'; ?>