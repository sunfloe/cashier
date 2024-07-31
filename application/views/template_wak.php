<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= $judul ?></title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="<?=base_url('assets/skydash/')?>vendors/feather/feather.css">
	<link rel="stylesheet" href="<?=base_url('assets/skydash/')?>vendors/ti-icons/css/themify-icons.css">
	<link rel="stylesheet" href="<?=base_url('assets/skydash/')?>vendors/css/vendor.bundle.base.css">
	<!-- endinject -->
	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="<?=base_url('assets/skydash/')?>vendors/datatables.net-bs4/dataTables.bootstrap4.css">
	<link rel="stylesheet" href="<?=base_url('assets/skydash/')?>vendors/ti-icons/css/themify-icons.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/skydash/')?>js/select.dataTables.min.css">
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="<?=base_url('assets/skydash/')?>css/vertical-layout-light/style.css">
	<!-- endinject -->
	<link rel="shortcut icon" href="<?=base_url('assets/skydash/')?>images/favicon.png" />
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" /> 
	<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"> </script> 

	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	

</head>

<body>
	<div class="container-scroller">
		<!-- partial:partials/_navbar.html -->
		<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
			<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
				<a class="navbar-brand brand-logo mr-5" >
					<h3 class="mt-2">sunfloe store</h4>
				</a>
				<a class="navbar-brand brand-logo-mini">
					<i class="ti-bag menu-icon"></i>
				</a>
			</div>
			<div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
				<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
					<span class="icon-menu"></span>
				</button>
				<div class="navbar-nav mr-lg-1">
					<div class="nav-item nav-search d-none d-lg-block">
						<h5 class="mt-2  mr-lg-2"><?= $judul ?></h5>
					</div>
				</div>
				<ul class="navbar-nav navbar-nav-right">
					<li class="nav-item nav-profile dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
							<img src="<?=base_url('assets/skydash/')?>images/user.jpg" alt="profile" />
						</a>
						<div class="dropdown-menu dropdown-menu-right navbar-dropdown"
							aria-labelledby="profileDropdown">
							<div class="dropdown-item">
								<span class="fw-semibold d-block"><?= $this->session->userdata('name');?></span>
								<small class="fw-semibold d-block"><?= $this->session->userdata('level');?></small>
							</div>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item">
								<i class="ti-settings text-primary"></i>
								Settings
							</a>
							<a class="dropdown-item" href="<?=base_url('auth/logout')?>">
								<i class="ti-power-off text-primary"></i>
								Logout
							</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>
		<!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<!-- partial:partials/_settings-panel.html -->
			<div class="theme-setting-wrapper">
				<div id="settings-trigger"><i class="ti-settings"></i></div>
				<div id="theme-settings" class="settings-panel">
					<i class="settings-close ti-close"></i>
					<p class="settings-heading">SIDEBAR SKINS</p>
					<div class="sidebar-bg-options selected" id="sidebar-light-theme">
						<div class="img-ss rounded-circle bg-light border mr-3"></div>Light
					</div>
					<div class="sidebar-bg-options" id="sidebar-dark-theme">
						<div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
					</div>
					<p class="settings-heading mt-2">HEADER SKINS</p>
					<div class="color-tiles mx-0 px-4">
						<div class="tiles success"></div>
						<div class="tiles warning"></div>
						<div class="tiles danger"></div>
						<div class="tiles info"></div>
						<div class="tiles dark"></div>
						<div class="tiles default"></div>
					</div>
				</div>
			</div>
			<!-- partial -->
			<!-- partial:partials/_sidebar.html -->
			<nav class="sidebar sidebar-offcanvas" id="sidebar">
				<?php $halaman = $this->uri->segment(1);?>
				<ul class="nav">

					<li class="nav-item" <?php if ($halaman == 'beranda'){echo "active";}?>>
						<a class="nav-link" href="<?=base_url('beranda')?>">
							<i class="icon-grid menu-icon"></i>
							<span class="menu-title">Dashboard</span>
						</a>
					</li>
					<?php if($this->session->userdata('level')=='admin'){ ?>
					<li class="nav-item" <?php if ($halaman == 'user'){echo "active";}?>>
						<a class="nav-link" href="<?=base_url('user')?>">
							<i class="icon-head menu-icon"></i>
							<span class="menu-title">User</span>
						</a>
					</li>
					<?php } ?>
					<?php if($this->session->userdata('level')=='admin'){ ?>
					<li class="nav-item" <?php if ($halaman == 'product'){echo "active";}?>>
						<a class="nav-link" href="<?=base_url('product')?>">
							<i class="ti-bag menu-icon"></i>
							<span class="menu-title">Product</span>
						</a>
					</li>
					
					<?php if($this->session->userdata('level')=='admin'){ ?>
					<!-- <li class="nav-item" <?php if ($halaman == 'categories'){echo "active";}?>>
						<a class="nav-link" href="<?=base_url('categories')?>">
							<i class="ti-credit-card menu-icon"></i>
							<span class="menu-title">Categories Product</span>
						</a>
					</li> -->
					<?php } ?>

					<li class="nav-item" <?php if ($halaman == 'customer'){echo "active";}?>>
						<a class="nav-link" href="<?=base_url('customer')?>">
							<i class="ti-id-badge menu-icon"></i>
							<span class="menu-title">Customer</span>
						</a>
					</li>
					
					<li class="nav-item" <?php if ($halaman == 'sale'){echo "active";}?>>
						<a class="nav-link" href="<?=base_url('sale')?>">
							<i class="ti-shopping-cart menu-icon"></i>
							<span class="menu-title">Sale</span>
						</a>
					</li>
					
					<!-- <li class="nav-item" <?php if ($halaman == 'purchase'){echo "active";}?>>
						<a class="nav-link" href="<?=base_url('purchase')?>">
							<i class="ti-share menu-icon"></i>
							<span class="menu-title">purchase</span>
						</a>
					</li>

					<li class="nav-item" <?php if ($halaman == 'suplier'){echo "active";}?>>
						<a class="nav-link" href="<?=base_url('suplier')?>">
							<i class="ti-truck menu-icon"></i>
							<span class="menu-title">suplier</span>
						</a>
					</li> -->
					<?php } ?>

					
	
					<li class="nav-item" <?php if ($halaman == 'kembaran_sirekap'){echo "active";}?>>
						<a class="nav-link" href="<?=base_url('kembaran_sirekap')?>">
							<i class="ti-thought menu-icon"></i>
							<span class="menu-title">Kembaran sirekap</span>
						</a>
					</li>
					

					

					

				</ul>
			</nav>
			<!-- partial -->
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="row">
						<div class="col-md-12 grid-margin">
							<?= $yoa; ?>
						</div>
					</div>
				</div>
				<!-- content-wrapper ends -->
				<!-- partial:partials/_footer.html -->
				<footer class="footer">
					
				</footer>
				<!-- partial -->
			</div>
			<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
	</div>
	<!-- container-scroller -->

	<!-- plugins:js -->
	<script src="<?=base_url('assets/skydash/')?>vendors/js/vendor.bundle.base.js"></script>
	<!-- endinject -->
	<!-- Plugin js for this page -->
	<script src="<?=base_url('assets/skydash/')?>vendors/chart.js/Chart.min.js"></script>
	<script src="<?=base_url('assets/skydash/')?>vendors/datatables.net/jquery.dataTables.js"></script>
	<script src="<?=base_url('assets/skydash/')?>vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
	<script src="<?=base_url('assets/skydash/')?>js/dataTables.select.min.js"></script>

	<!-- End plugin js for this page -->
	<!-- inject:js -->
	<script src="<?=base_url('assets/skydash/')?>js/off-canvas.js"></script>
	<script src="<?=base_url('assets/skydash/')?>js/hoverable-collapse.js"></script>
	<script src="<?=base_url('assets/skydash/')?>js/template.js"></script>
	<script src="<?=base_url('assets/skydash/')?>js/settings.js"></script>
	<script src="<?=base_url('assets/skydash/')?>js/todolist.js"></script>
	<!-- endinject -->
	<!-- Custom js for this page-->
	<script src="<?=base_url('assets/skydash/')?>js/dashboard.js"></script>
	<script src="<?=base_url('assets/skydash/')?>js/Chart.roundedBarCharts.js"></script>
	<!-- End custom js for this page-->
	<script>
		$('#hilang').slideDown('slow').delay(1000).slideUp(1000);
	</script>

	<script>
		$(document).ready( function () {
    	$('#tabelku').DataTable();
		});
	</script>

	<script>
		$(document).ready(function() {
    	    $('.js-example-basic-single').select2();
		});
	</script>
</body>

</html>
