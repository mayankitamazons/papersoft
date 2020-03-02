<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $this->request->webroot; ?>assets/images/favicon.png">
    <title>Apna Epaper -News Paper Management solution</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $this->request->webroot; ?>Admin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	 <link href="<?php echo $this->request->webroot; ?>Admin/assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link href="<?php echo $this->request->webroot; ?>css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo $this->request->webroot; ?>css/colors/blue.css" id="theme" rel="stylesheet">
	 <link href="<?php echo $this->request->webroot; ?>Admin/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->  
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- Daterange picker plugins css -->
    <link href="<?php echo $this->request->webroot; ?>Admin/assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="<?php echo $this->request->webroot; ?>Admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

	</head>
<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
      
       <?php echo $this->element('Admin/header');?>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                          
                        </ol>
                    </div>
                   <!-- <div class="col-md-7 col-4 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">
                            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                                <div class="chart-text m-r-10">
                                    <h6 class="m-b-0"><small>THIS MONTH</small></h6>
                                    <h4 class="m-t-0 text-info">$58,356</h4></div>
                                <div class="spark-chart">
                                    <div id="monthchart"></div>
                                </div>
                            </div>
                            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                                <div class="chart-text m-r-10">
                                    <h6 class="m-b-0"><small>LAST MONTH</small></h6>
                                    <h4 class="m-t-0 text-primary">$48,356</h4></div>
                                <div class="spark-chart">
                                    <div id="lastmonthchart"></div>
                                </div>
                            </div>
                            <div class="">
                                <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                            </div>
                        </div>
                    </div>-->
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                 <?= $this->fetch('content') ?>
               <?php echo $this->element('Admin/rightsidebar');?>
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
	
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
	
    <script src="<?php echo $this->request->webroot; ?>Admin/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo $this->request->webroot; ?>Admin/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo $this->request->webroot; ?>Admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo $this->request->webroot; ?>js/jquery.slimscroll.js"></script>
	<!--  my custome js!-->
	<script src="<?php echo $this->request->webroot; ?>js/script.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo $this->request->webroot; ?>js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo $this->request->webroot; ?>js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo $this->request->webroot; ?>Admin/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo $this->request->webroot; ?>Admin/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--stickey kit -->
    <script src="<?php echo $this->request->webroot; ?>Admin/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo $this->request->webroot; ?>Admin/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo $this->request->webroot; ?>Admin/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo $this->request->webroot; ?>js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
   
   <!-- Vector map JavaScript -->
    <script src="<?php echo $this->request->webroot; ?>Admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?php echo $this->request->webroot; ?>Admin/assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js"></script>
  
	 <script src="<?php echo $this->request->webroot; ?>Admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
	   <script src="<?php echo $this->request->webroot; ?>js/dataTables.buttons.min.js"></script>
	   <script src="<?php echo $this->request->webroot; ?>js/buttons.flash.min.js"></script>
	   <script src="<?php echo $this->request->webroot; ?>js/jszip.min.js"></script>
	   <script src="<?php echo $this->request->webroot; ?>js/pdfmake.min.js"></script>
	   <script src="<?php echo $this->request->webroot; ?>js/vfs_fonts.js"></script>
	   <script src="<?php echo $this->request->webroot; ?>js/buttons.html5.min.js"></script>
	   <script src="<?php echo $this->request->webroot; ?>js/buttons.print.min.js"></script>
       <script src="<?php echo $this->request->webroot; ?>Admin/assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
	   <!-- Date range Plugin JavaScript -->
	     <script src="<?php echo $this->request->webroot; ?>Admin/assets/plugins/moment/moment.js"></script>
    <script src="<?php echo $this->request->webroot; ?>Admin/assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?php echo $this->request->webroot; ?>Admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo $this->request->webroot; ?>Admin/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
	<link href="<?php echo $this->request->webroot; ?>Admin/assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <script src="<?php echo $this->request->webroot; ?>Admin/assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>


	
	 
</body>

</html>