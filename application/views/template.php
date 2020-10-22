<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sistem Informasi Input FRS</title>
        <!-- <script src="http://maps.googleapis.com/maps/api/js"></script> -->
        
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-ui/themes/base/minified/jquery-ui.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/bower_components/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/bower_components/Ionicons/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/dist/css/skins/_all-skins.min.css">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Google Font -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="#" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>SI</b>PEL</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>SISTEM </b>PELAYANAN</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">                          


                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php 
                                             $level = $this->session->userdata('tingkat');
                                             if ($level == 'admin'){
                                                 echo $this->session->userdata('full_name'); 
                                             }else{
                                                echo $this->session->userdata('nama_mhs');
                                                
                                    } ?>   
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        
                                        <?php 
                                            $level = $this->session->userdata('tingkat');
                                            $images = $this->session->userdata('images');
                                            if ($level == 'admin'){
                                                echo "<img src='".base_url('assets/foto_profil/'.$images)."' width='50px' height='50px' class='img-circle' alt='User Image'> ";
                                                
                                                //echo anchor(site_url('#'.$this->session->userdata('id_users')),$image);
                                                
                                                //echo "<a href='#' class='btn btn-default btn-flat'>Profile</a>";
                                            }else{
                                                echo "<img src='".base_url('assets/foto_mhs/'.$images)."' width='50px' height='50px' class='img-circle' alt='User Image'>";
                                                
                                                //echo anchor(site_url('#'.$this->session->userdata('id_mhs')),$image);
                                            }?>
                                        <p>
                                             <?php 
                                             $level = $this->session->userdata('tingkat');
                                             if ($level == 'admin'){
                                                 echo $this->session->userdata('full_name'); 
                                             }else{
                                                echo $this->session->userdata('nama_mhs');
                                                echo "<br>";
                                                echo $this->session->userdata('npm');
                                             } ?>                                         
                                            <small>-</small>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <!-- <?php 
                                            $level = $this->session->userdata('tingkat');
                                            if ($level == 'admin'){
                                                echo anchor('#', 'Profile', array('class' => 'btn btn-default btn-flat'));
                                                //echo "<a href='#' class='btn btn-default btn-flat'>Profile</a>";
                                            }else{
                                                echo anchor(site_url('inputfrs/update/'.$this->session->userdata('id_mhs')), 'Profile', array('class' => 'btn btn-default btn-flat'));
                                                //echo "<a href='#' class='btn btn-default btn-flat'>Profile</a>";
                                            }?> -->
                                        </div>
                                        <div class="pull-right">
                                            <?php 
                                            $level = $this->session->userdata('tingkat');
                                            if ($level == 'admin'){
                                                echo anchor('auth/logout', 'Logout', array('class' => 'btn btn-default btn-flat'));
                                                //echo "<a href='#' class='btn btn-default btn-flat'>Profile</a>";
                                            }else{
                                                echo anchor('log/logout', 'Logout', array('class' => 'btn btn-default btn-flat'));
                                                //echo "<a href='#' class='btn btn-default btn-flat'>Profile</a>";
                                            }?>
                                            
                                            <!--<a href="#" class="btn btn-default btn-flat">Sign out</a>-->
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <?php $this->load->view('template/sidebar'); ?>
            </aside>

            <?php
            echo $contents;
            ?>


            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.4.0
                </div>
                <strong>Copyright &copy; 2020 <a href="https://adminlte.io">MIH</a>.</strong> All rights
                reserved.
            </footer>

           
        <!-- ./wrapper -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery-ui/ui/minified/jquery-ui.min.js"></script>
        <!-- jQuery 3
        <script src="<?php echo base_url() ?>assets/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
         -->
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo base_url() ?>assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="<?php echo base_url() ?>assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="<?php echo base_url() ?>assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url() ?>assets/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url() ?>assets/adminlte/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url() ?>assets/adminlte/dist/js/demo.js"></script>
        <!-- Select2 -->
        <script src="<?php echo base_url() ?>assets/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>

        <!-- page script -->
        <script>
          $(document).ready(function() {
            var table = $('#tabel-data').DataTable( {
            scrollY: 300,
            scrollX: true,
            //paging      : true
        } );
    } );
            $(function () {
                $('.select2').select2()
                $('#example1').DataTable()
                $('#example2').DataTable({
                    'paging'      : true,
                    'lengthChange': false,
                    'searching'   : false,
                    'ordering'    : true,
                    'info'        : true,
                    'autoWidth'   : false
                })
            })
        </script>
    </body>
</html>
