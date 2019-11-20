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
            padding: 20px 0px; 
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

  

    
    <section class="">
        <div class="container">
            <h3 class="light center grey-text text-darken-3 efek">DAFTAR USER</h3>
            <div class="row card-panel">
              <div class="input-field col m4 s6 right">
                <i class="material-icons prefix">search</i>
                <input type="text" placeholder="search" id="autocomplete-input" class="autocomplete" >
              </div>

              <table class="responsive-table highlight centered">
                <thead>
                  <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tempat Tinggal</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach ($pengguna as $y ) : ?>
                  <tr>
                    <td><?= $y->nis ?></td>
                    <td><?= $y->nama_pengguna ?></td>
                    <td><?= $y->email ?></td>
                    <td><?= $y->alamat ?></td>
                    <td>
                      <a class="waves-effect waves-light btn cyan modal-trigger" href="#modal1">PROFIL</a>
                      <!-- <a href="edit_pegawai.html" class="waves-effect waves-light btn green lighten-1">EDIT</a> -->
                      <a href="<?=base_url('C_pengguna/delete/'). $y->id_pengguna ?>" class="waves-effect waves-light btn amber darken-1">HAPUS</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>

              <div id="modal1" class="modal">
                <div class="modal-content">
                  <h4>PROFIL</h4>
                  <table class="responsive-table highlight centered">
                    <thead>
                      <tr>
                        <th>NIS</th>
                        <TH>Nama</TH>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Password</th>
                      </tr>
                    </thead>
                    <tbody>
						          <?php foreach ($pengguna as $y ) : ?>
                      <tr>
                        <td><?= $y->nis ?></td>
                        <td><?= $y->nama_pengguna ?></td>
                        <td><?= $y->email ?></td>
                        <td><?= $y->username ?></td>
                        <td><?= $y->password ?></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <div class="modal-footer">
                  <a href="#!" class="modal-close waves-effect waves-light btn cyan">TUTUP</a>
                </div>
              </div>

                
            </div>
            </div>
        </div>

    </section>

    <?php include 'V_footer.php'; ?>