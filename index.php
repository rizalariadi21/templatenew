<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
date_default_timezone_set("Asia/Makassar");
include "modul/koneksi.php";
if(isset($_SESSION['username'])){

	?><script language="javascript">document.location.href="main.php?page=home";</script><?php
            
        }else{

if (isset($_POST['Login'])){
    //koneksi terpusat
	$tgl= date('Y-m-d h:i:s');
    $username=mysqli_real_escape_string($koneksi,$_POST['username']);
    // $password=md5($_POST['password']);
    $password=mysqli_real_escape_string($koneksi,$_POST['password']);
    
    // $level=$_POST['level'];
     
        $query=mysqli_query($koneksi,"select * from tabel_login where username='$username' and password='$password' and aktif='Y' ");
        $cek=mysqli_num_rows($query);
        
        if($cek){
    	mysqli_query($koneksi,"INSERT INTO `last_login`(`lastlogin`, `username`, `keterangan`) VALUES ('$tgl', '$username','berhasil')");
        	
          $row=mysqli_fetch_array($query);
            $_SESSION['username']=$row['username'];
            $_SESSION['level']=$row['level'];
            $_SESSION['nama']=$row['nama'];


            
            ?><script language="javascript">document.location.href="main.php?page=home";</script><?php
            
        }else{
    	mysqli_query($koneksi,"INSERT INTO `last_login`(`lastlogin`, `username`, `keterangan`) VALUES ('$tgl', '$username','$password')");

            ?><script language="javascript">document.location.href="index.php?status=Gagal Login";</script><?php
        }   
    }else{
    unset($_POST['Login']);
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Sidia | Login</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN core-css ================== -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
	<link href="assets/css/vendor.min.css" rel="stylesheet" />
	<link href="assets/css/google/app.min.css" rel="stylesheet" />
	<!-- ================== END core-css ================== -->
</head>
<body class='pace-top'>
	<!-- BEGIN #loader -->
	<div id="loader" class="app-loader">
		<span class="spinner"></span>
	</div>
	<!-- END #loader -->


	<!-- BEGIN #app -->
	<div id="app" class="app">
		<!-- BEGIN login -->
		<div class="login login-v1">
			<!-- BEGIN login-container -->
			<div class="login-container">
				<!-- BEGIN login-header -->
				<div class="login-header">
					<div class="brand">
						<div >
							<span class="logo">
								<span class="text-blue">S</span>
								<span class="text-red">i</span>
								<span class="text-orange">d</span>
								<span class="text-blue">i</span>
								<span class="text-green">a</span>
								<span class="text-red">.</span>
							</span> <b>Login</b> Admin
						</div>
						<small></small>
					</div>
					<div class="icon">
						<i class="fa fa-lock"></i>
					</div>
				</div>
				<!-- END login-header -->
				
				<!-- BEGIN login-body -->
				<div class="login-body">
					<!-- BEGIN login-content -->
					<div class="login-content fs-13px">
					<?php  
                                    if(isset($_GET['status'])){
                                ?>
                                <div class="alert alert-danger text-center"><span class="glyphicon glyphicon-warning-sign"></span><?php echo " &nbsp;".$_GET['status']."";?></div>
                                <?php }?>
				<form action="#" method="post" class="margin-bottom-0">
							<div class="form-floating mb-20px">
								<input type="text" class="form-control fs-13px h-45px" name="username" placeholder="Username" required  />
								<label for="emailAddress" class="d-flex align-items-center py-0">Username</label>
							</div>
							<div class="form-floating mb-20px">
								<input type="password" class="form-control fs-13px h-45px" name="password" placeholder="Password" required  />
								<label for="password" class="d-flex align-items-center py-0">Password</label>
							</div>
							<div class="login-buttons">
							<input class="btn h-45px btn-primary d-block w-100 btn-lg" name="Login" type="submit" value="Login">

							</div>
						</form>
					</div>
					<!-- END login-content -->
				</div>
				<!-- END login-body -->
			</div>
			<!-- END login-container -->
		</div>
		<!-- END login -->
		
		<!-- BEGIN theme-panel -->
		<!-- END theme-panel -->
		<!-- BEGIN scroll-top-btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
		<!-- END scroll-top-btn -->
	</div>
	<!-- END #app -->
	
	<!-- ================== BEGIN core-js ================== -->
	<script src="assets/js/vendor.min.js"></script>
	<script src="assets/js/app.min.js"></script>
	<script src="assets/js/theme/google.min.js"></script>
	<!-- ================== END core-js ================== -->
</body>
</html>