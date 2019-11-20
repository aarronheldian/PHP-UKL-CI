  <!DOCTYPE html>
  <html>
    <head>
  	    <title>Login</title>
  	    <!--Import Google Icon Font-->
  	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  	    <!--Import materialize.css-->
  	    <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/materialize.min.css"  media="screen,projection"/>

  	    <!--Let browser know website is optimized for mobile-->
  	    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  	    <style type="text/css">
        body {
          background-image: url("http://localhost/ukl/assets/img/yellow.png");
          background-size: cover;
        }
        .ikon {
          margin-top: 200px;
        }
        footer {
            margin-top: 50px;
            opacity: 0.8;
          }

  	    </style>
    </head>


    <body>

      <section>
        <div class="container">
            <div class="row">
              <h5 class="center ikon"><i class=" material-icons large">account_circle</i></h5>
              <div class="col m6 push-m3 s12">
                  <form  action="<?= base_url('C_login') ?>" method="post">
                      <div class="card-panel center">
                          <div class="input-field">
                              <i class="material-icons prefix">mail_outline</i>
                              <input id="username" type="text" class="validate" name="username" required>
                              <label for="username">username</label>
                              <span class="helper-text" data-error="Username salah" data-success=""></span>
                          </div>
                          <div class="input-field">
                              <i class="material-icons prefix">lock_outline</i>
                              <input id="password" type="password" class="validate" name="password" required>
                              <label for="password">Password</label>
                              <span class="helper-text" data-error="Password salah" data-success=""></span>
                          </div>
                          <button type="submit" class="waves-effect waves-light btn cyan">LOGIN</button>
                  </form>
                  <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Buat Akun</a>
                      </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true" >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4>FORM REGISTRASI</h4>
                </div>
                <div class="modal-body" >
                  <form action="<?= base_url('C_login/add') ?>" method="post">
                      <div class="input-field">
                        <i class="material-icons prefix">storage</i>
                        <input id="np" type="text" name="nama_pengguna" required>
                        <label for="np">Nama Anda</label>
                      </div>
                      <div class="input-field">
                        <i class="material-icons prefix">chevron_right</i>
                        <input id="emial" type="email" name="email" required>
                        <label for="email">Email</label>
                      </div>
                      <div class="input-field">
                        <i class="material-icons prefix">chevron_right</i>
                        <input id="nis" type="text" name="nis" required>
                        <label for="nis">NIS</label>
                      </div>
                      <div class="input-field row">
                        <i class="material-icons prefix">library_books</i>
                        <input id="alamat" type="text" name="alamat" required>
                        <label for="alamat">alamat</label>
                      </div>
                      <div class="input-field row">
                        <i class="material-icons prefix">library_books</i>
                        <input id="telepon" type="text" name="telepon" required>
                        <label for="telepon">Nomer Telepon</label>
                      </div>
                      <div class="input-field row">
                        <i class="material-icons prefix">library_books</i>
                        <input id="username" type="text" name="username" required>
                        <label for="username">Username</label>
                      </div>
                      <div class="input-field row">
                        <i class="material-icons prefix">library_books</i>
                        <input id="password" type="password" name="password" required>
                        <label for="password">Password</label>
                      </div>
                </div>
                <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Buat</button>
                      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Batal</a>
                </div>
                  </form>
              </div>
            </div>
        </div>
      </section>

      <footer class="footer">
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/demo.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/footer.css">
        <div class="center">
    
          <img src="https://www.smktelkom-mlg.sch.id/assets/front/img/logo-moklet.png" alt="" class="logo">
    
          <p class="footer-company-about">
            <br><br>
          <small></small>
            Pelopor SMK bidang Teknologi dan Informatika di Indonesia.<br>Berpengalaman dari tahun 1992 yang telah terakreditasi "A"<br>dan mempunyai standart mutu ISO 9001:2008.
          </p><br><br>
          <small></small>
    
          <p class="footer-company-name">SMK TELKOM MALANG &copy; 2018</p>
        </div>
    
        <div class="center">
    
          <div>
            <a href="https://goo.gl/maps/KGkHAA4QvRH2">
            <i class="fa fa-map-marker"></i></a>
            <p><span>Jl. Danau Ranau </span> Sawojajar, Malang</p>
          </div>
    
          <div>
            <i class="fa fa-phone"></i>
            <p>0341-712500</p>
          </div>
    
          <div>
            <i class="fa fa-envelope"></i>
            <p><a href="mailto:info@smktelkom-mlg.sch.id">info@smktelkom-mlg.sch.id</a></p>
          </div>
    
        </div>

      </footer>
    </body>
    </html>

      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="<?=base_url()?>assets/js/materialize.min.js"></script>
      <script>
        const sideNav = document.querySelectorAll('.sidenav');
        M.Sidenav.init(sideNav);
        const datePicker = document.querySelectorAll('.datepicker');
        M.Datepicker.init(datePicker);
        const scroll = document.querySelectorAll('.scrollspy');
        M.ScrollSpy.init(scroll, {
          scrollOffset: 50 });
        const parallax = document.querySelectorAll('.parallax');
        M.Parallax.init(parallax);
        const modal = document.querySelectorAll('.modal');
        M.Modal.init(modal);
        const select = document.querySelectorAll('select');
        M.FormSelect.init(select);

      </script>