<?php include 'V_header.php'; ?>
  
  <!DOCTYPE html>
  <html>
    <head>
	    <title>Data Pinjam Barang</title>
	    <!--Import Google Icon Font-->
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	    <!--Import materialize.css-->
	    <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/materialize.min.css"  media="screen,projection"/>

	    <!--Let browser know website is optimized for mobile-->
	    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	    <style type="text/css">
	    	.parallax-container {
			    height: 425px;
			}
			.efek {
            	text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
	        }
	        section, footer {
            	padding: 20px 0px; 
        	}
        	.card-panel {
        		margin-top: 180px;
        	}
          body {
            background-image: url("http://localhost/ukl/assets/img/header-bg.jpg");
            background-size: cover;
          }
          footer {
            margin-top: 245px;
            opacity: 0.8;
          }

	    </style>


    </head>
	

    <body>
    
    <section class="">
      <div class="container">
          <h3 class="light center grey-text text-darken-3 efek">DAFTAR PEMINJAMAN</h3>
          <div class="row card-panel">
            <?php if ($_SESSION['level'] == "user") : ?>
            <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Form Ngampil</a>
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
                  <th>Jumlah</th>
                  <th>Nama Peminjam</th>
                  <th>Status</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Kembali</th>
                  <?php if($_SESSION['level'] == "admin") : ?>
                  <th class="numeric text-center" colspan="2">OPSI</th>
                  <?php endif;?>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; ?>
						    <?php foreach ($peminjaman as $x ) : ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $x->nama ?></td>
                  <td><?= $x->qty ?></td>
                  <td><?= $x->nama_pengguna ?></td>
                  <?php if ($x->status == 0) : ?>
							    <td>menunggu konfirmasi</td>
							    <?php elseif($x->status == 1) : ?>
							    <td>dalam peminjaman</td>
							    <?php else: ?>
							    <td>sudah dikembalikan</td>
							    <?php endif; ?>
                  <td><?= $x->tanggal_pinjam ?></td>
                  <td><?= $x->tanggal_kembali ?></td>
                  <?php if($_SESSION['level'] == "admin") : ?>
							    <td class='text-center'>
                    <a href="<?=base_url('C_peminjaman/delete/'). $x->id_pinjam ?>" class="waves-effect waves-light btn amber darken-1">HAPUS</a>
							    </td>
							    <td class='text-center'>
							    	<?php if ($x->status == 0) : ?>
							    	<a href="<?=base_url('C_peminjaman/konfirmasi/'). $x->id_pinjam ?>" class="waves-effect waves-light btn amber darken-1">KONFIRMASI</a>
                    <?php elseif($x->status == 1) : ?>
							    	<a href="<?=base_url('C_peminjaman/kembali/'). $x->id_pinjam ?>" class="waves-effect waves-light btn amber darken-1">KEMBALI</a>
							    	<?php endif; ?>
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
                <h4>Form Ngampil</h4>
              </div>
              <div class="modal-body" >
                <form action="<?= base_url('C_peminjaman/add') ?>" method="post">
                  <div class="input-field col s12">
                    <select name="id_inventaris" id="id_inventaris" class="select" >
                        <option value="" disabled selected>Pilih Barang</option>
                        <?php foreach ($barang as $b) : ?>
                        <option value="<?= $b->id_inventaris ?>"><?= $b->nama ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix">storage</i>
                    <input id="qty" type="text" name="qty" required>
                    <label for="qty">Jumlah</label>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix">storage</i>
                    <input id="nb" type="datetime-local" name="tanggal_kembali" required>
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

      <div>
          <div id="modal1" class="modal">
            <div class="modal-content">
              <h4>Form Ngampil</h4>

              <form action="<?= base_url('C_peminjaman/add') ?>" method="post">
                  <div class="input-field col s12">
                    <select name="nama" id="nama" class="select" >
                        <option value="" disabled selected>Choose your option</option>
                        <?php foreach ($barang as $b) : ?>
                        <option value="<?= $b->id_inventaris ?>"><?= $b->nama ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix">storage</i>
                    <input id="nb" type="date" name="tanggal_kembali" required>
                    <label for="nb">Tanggal Kembali</label>
                  </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Buat</button>
              <a href="#!" class="modal-close waves-effect waves-green btn-flat">Batal</a>
              </form>
            </div>
          </div>
      </div>
    
    </section>
    

    <?php include 'V_footer.php'; ?>