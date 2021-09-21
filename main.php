<?php session_start();
date_default_timezone_set("Asia/Makassar"); 

$tanggal = date("l, d-m-Y"); 
if(isset($_SESSION['username'])){
  $username =$_SESSION['username'];
  $level    =$_SESSION['level'];
  $nama    =$_SESSION['nama'];



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Sidia | Sistem Admin</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN core-css ================== -->
	<link href="assets/css/css.css" rel="stylesheet" />
	<link href="assets/css/icon.css" rel="stylesheet" />
	<link href="assets/css/vendor.min.css" rel="stylesheet" />
	<link href="assets/css/google/app.min.css" rel="stylesheet" />
	<!-- ================== END core-css ================== -->
	<?php
      if(isset($add_css)){
          foreach ($add_css as $item) {
              echo "<link rel='stylesheet' href='".$item."'>";
          }
      }
  ?>
</head>
<body>
	<!-- BEGIN #loader -->
	<div id="loader" class="app-loader">
		<span class="spinner"></span>
	</div>
	<!-- END #loader -->
	<!-- BEGIN #app -->
	<div id="app" class="app app-header-fixed app-sidebar-fixed app-with-wide-sidebar app-with-light-sidebar">
		<!-- BEGIN #header -->
		<div id="header" class="app-header">
			<!-- BEGIN navbar-header -->
			<div class="navbar-header">
				<button type="button" class="navbar-desktop-toggler" data-toggle="app-sidebar-minify">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="index.html" class="navbar-brand">
					<!-- <b class="me-1">Color</b> Admin -->
					<span class="navbar-logo">
					<span class="text-blue">S</span>
								<span class="text-red">i</span>
								<span class="text-orange">d</span>
								<span class="text-blue">i</span>
								<span class="text-green">a</span>
								<span class="text-red">.</span>
					</span>
				</a>
				<button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- END navbar-header -->
			<!-- BEGIN header-nav -->
			<div class="navbar-nav">
				<div class="navbar-item navbar-form">
					
				</div>
			
				<div class="navbar-item navbar-user dropdown">
					<a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
						<div class="image image-icon bg-gray-800 text-gray-600">
							<i class="fa fa-user"></i>
						</div>
						<span class="d-none d-md-inline"><?php echo $nama;?></span> <b class="caret ms-lg-2"></b>
					</a>
					<div class="dropdown-menu dropdown-menu-end me-1">
						<!-- <a href="javascript:;" class="dropdown-item">Edit Profile</a>
						<a href="javascript:;" class="dropdown-item"><span class="badge badge-danger float-end">2</span> Inbox</a>
						<a href="javascript:;" class="dropdown-item">Calendar</a>
						<a href="javascript:;" class="dropdown-item">Setting</a>
						<div class="dropdown-divider"></div> -->
						<a href="modul/logout.php" class="dropdown-item">Log Out</a>
					</div>
				</div>
			</div>
			<!-- END header-nav -->
		</div>
		<!-- END #header -->
		<!-- BEGIN #sidebar -->
		<div id="sidebar" class="app-sidebar">
			<!-- BEGIN scrollbar -->
			<div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
				<!-- BEGIN menu -->
				<div class="menu">
					<div class="menu-header">Menu</div>
					<?php include("menu.php") ?>
				</div>
				<!-- END menu -->
			</div>
			<!-- END scrollbar -->
		</div>
		<div class="app-sidebar-bg"></div>
		<div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a></div>
		<!-- END #sidebar -->
		
		<!-- BEGIN #content -->
		<div id="content" class="app-content">
		<input type="hidden" id="username" value="<?php echo $username;?>">
			<input type="hidden" id="divisi" value="<?php echo $divisi;?>">
			<input type="hidden" id="level" value="<?php echo $level;?>">
			<!-- BEGIN breadcrumb -->
			<?php 
	   			include('page_control.php');
		    ?>
		
			<!-- END panel -->
		</div>
		<!-- END #content -->
		
		<!-- BEGIN scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
		<!-- END scroll to top btn -->
	</div>
	<!-- END #app -->
	
	<!-- ================== BEGIN core-js ================== -->
	<script src="assets/js/vendor.min.js"></script>
	<script src="assets/js/app.min.js"></script>
	<script src="assets/js/theme/google.min.js"></script>
	<!-- ================== END core-js ================== -->
	<?php
      if(isset($modul_js)){
          foreach ($modul_js as $item) {
              echo "<script type='text/javascript' src='https://".$_SERVER['SERVER_NAME']."/".$item."'></script>";
               //ambil semua include-an js
          }
      }
  ?>
</body>
</html>

<?php
$timeout = 900; // Number of seconds until it times out.
 
// Check if the timeout field exists.
if(isset($_SESSION['timeout'])) {
    // See if the number of seconds since the last
    // visit is larger than the timeout period.
    $duration = time() - (int)$_SESSION['timeout'];
    if($duration > $timeout) {
        // Destroy the session and restart it.
        session_destroy();
        session_start();
    }
}
 
// Update the timout field with the current time.
$_SESSION['timeout'] = time();
}else{
  session_destroy();
  header('Location:index.php?status=Silahkan Login');
}
?>