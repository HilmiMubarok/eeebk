<?php $uri = $this->uri->segment(1) ?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title><?= $title ?></title>

		<!-- Custom fonts for this template-->
		<link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

		<!-- Custom styles for this template-->
		<link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
		<link href="<?= base_url() ?>assets/css/datepicker.min.css" rel="stylesheet">
		<link href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
		<link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
		<link href="<?= base_url() ?>assets/css/select2.min.css" rel="stylesheet">
		<link href="<?= base_url() ?>assets/css/select2-bootstrap.min.css" rel="stylesheet">

	</head>

	<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url("dashboard") ?>">
				<div class="sidebar-brand-icon rotate-n-15">
		          <i class="fas fa-laugh-wink"></i>
		        </div>
				<div class="sidebar-brand-text mx-3">EBK SMK N 5 </div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url("dashboard") ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span>
				</a>
			</li>

			<?php if ($this->session->userdata('level') == "bk"): ?>
				<li class="nav-item">
					<a class="nav-link collapsed" href="#!" data-toggle="collapse" data-target="#skoring" aria-expanded="true" aria-controls="skoring">
						<i class="fas fa-ban"></i>
						<span>Skoring </span>
					</a>
					<div id="skoring" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
					  <div class="bg-white py-2 collapse-inner rounded">
					    <a class="collapse-item <?= ($uri == "pelanggaran" ? "active" : null) ?>" href="<?= base_url('pelanggaran') ?>">Master Pelanggaran</a>
					    <a class="collapse-item <?= ($uri == "skoring" ? "active" : null) ?>" href="<?= base_url('skoring') ?>">Skoring</a>
					  </div>
					</div>
					
				</li>
				<li class="nav-item">
					<a class="nav-link collapsed" href="#!" data-toggle="collapse" data-target="#rewarding" aria-expanded="true" aria-controls="rewarding">
						<i class="fas fa-book-open"></i>
						<span>Rewarding </span>
					</a>
					<div id="rewarding" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
					  <div class="bg-white py-2 collapse-inner rounded">
					    <a class="collapse-item <?= ($uri == "reward" ? "active" : null) ?>" href="<?= base_url('reward') ?>">Master Reward</a>
					    <a class="collapse-item <?= ($uri == "rewarding" ? "active" : null) ?>" href="<?= base_url('rewarding') ?>">Rewarding</a>
					  </div>
					</div>
					
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('siswa') ?>">
						<i class="fas fa-fw fa-user"></i>
						<span>Siswa</span>
					</a>
				</li>
			<?php endif ?>

			<?php if ($this->session->userdata('level') == "siswa"): ?>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('konseling') ?>">
						<i class="fas fa-fw fa-ban"></i>
						<span>Konseling</span>
					</a>
				</li>
			<?php endif ?>

			<!-- Menu User -->
			<!-- <li class="nav-item">
				<a class="nav-link collapsed" href="#!" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
					<i class="fas fa-fw fa-book-open"></i>
					<span>Dropdown</span>
				</a>
				<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
				  <div class="bg-white py-2 collapse-inner rounded">
				    <h6 class="collapse-header">Dropdown Header</h6>
				    <a class="collapse-item" href="#!">Dropdown 1</a>
				    
				  </div>
				</div>
				
			</li> -->

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<li class="nav-item">
				<a class="nav-link" href="auth/logout">
					<i class="fas fa-fw fa-sign-out-alt"></i>
					<span>Logout</span>
				</a>
			</li>

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline mt-3">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->