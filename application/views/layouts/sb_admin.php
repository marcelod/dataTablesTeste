<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <title><?php echo $template['title']; ?></title>
    <base href="<?php echo base_url(); ?>">

    <!-- Files CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/offcanvas.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css?v=<?php echo filemtime('assets/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/main.css?v=<?php echo filemtime('assets/css/main.css') ?>" rel="stylesheet">

    <?php if(isset($css)) echo $css; ?>

    <script>var BASE_URL = '<?php echo base_url(); ?>';</script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url(); ?>assets/js/html5shiv.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/respond.min.js"></script>
    <![endif]-->

  </head>


  <body>

    <div id="ajaxLoadAni">
      <img src="assets/img/ajax-loader.gif" alt="Carregando..." width="32px" height="32px" />
      <span>Carregando...</span>
    </div>

    <div id="wrapper">

      <!-- Fixed navbar -->
      <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="admin">
            <img src="assets/img/logo.png" id="logoAdmin"> <?php echo SITE_NAME ?>
          </a>
        </div>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse top-nav">

          <?php echo $template['partials']['menu'] ?>

          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="editar_perfil" class="navbar-link">
                <i class="glyphicon glyphicon-user"></i>
                Usuário
              </a>
            </li>
            <li>
              <a href="logout" class="navbar-link">
                Sair
                <i class="glyphicon glyphicon-log-out"></i>
              </a>
            </li>
          </ul>

        </div><!--/.nav-collapse -->

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">

            <?php echo $template['partials']['sidebar'] ?>

        </div>
      </div>

      <div id="page-wrapper">

          <div class="container-fluid">

              <!-- Page Heading -->
              <div class="row">
                  <div class="col-lg-12">
                      <?php echo $template['body'] ?>
                  </div>
              </div>
              <!-- /.row -->

             <hr>

              <div class="footer">
                <div class="row">
                    <div class="col-md-12"><?php echo COPYRIGHT_FOOTER; ?></div>
                    <!-- <div class="col-sm-6 text-right muted">Página processada em <strong>{elapsed_time}</strong> segundos</div> -->
                </div>
              </div>

          </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div> <!-- #wrapper -->

    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.livequery.js"></script>

    <?php if(isset($js)) echo $js; ?>

    <script src="<?php echo base_url(); ?>assets/js/main.js?v=<?php echo filemtime('assets/js/main.js') ?>"></script>

    <script src="<?php echo base_url(); ?>assets/js/holder.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/offcanvas.js"></script>

  </body>
</html>