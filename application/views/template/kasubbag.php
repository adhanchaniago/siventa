<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $this->session->userdata('level'); ?> - SiVenta 2018</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets');?>/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- bootstrap datepicker -->
    <link href="<?php echo base_url('assets');?>/vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url('assets');?>/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?php echo base_url('assets');?>/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url('assets');?>/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets');?>/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Jquery UI CSS -->
    <link href="<?php echo base_url('assets');?>/vendor/jqueryui/jquery-ui.css" rel="stylesheet">

    <link href="<?php echo base_url('assets');?>/vendor/validetta/validetta.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets');?>/vendor/font-awesome/v4/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets');?>/vendor/font-awesome/v5/css/fontawesome-all.min.css" rel="stylesheet" type="text/css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
    .float-vertical-align {
        border: 1px solid red;

        position: absolute;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
    }

    textarea.vresize { resize:vertical; }

    .swal2-popup {
    font-size: 1.6rem !important;
    }
    
    body a.ui-slider-handle.ui-state-default.ui-corner-all {
        background:#09a4d7;
    }

    body a.ui-slider-handle.ui-state-default.ui-corner-all.ui-state-hover {
        background:#067ba2;
    }
    </style>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Sistem Informasi Inventaris FTI</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> Hi, <?= $this->session->userdata('nama');?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-cog fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?= base_url('login/logout')?>"><i class="fa fa-sign-out-alt fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo base_url('kasubbag');?>"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('kasubbag/lokasi');?>"><i class="fa fa-map-marker-alt fa-fw"></i> Manajemen Lokasi</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('kasubbag/inventaris');?>"><i class="fa fa-laptop fa-fw"></i> Inventaris</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('kasubbag/label');?>"><i class="fa fa-tag fa-fw"></i> Label</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('kasubbag/laporan');?>"><i class="fa fa-file-alt fa-fw"></i> Laporan</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Content -->
        <?php echo $contents;?>

</body>

</html>
