<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
<?php
$this->load->helper('notif');
$this->load->helper('tanggal');
$notif = countNotifPelanggaranSiswa($this->session->userdata('username'))->result(); 
?>
	<!-- Main Content -->
	<div id="content">

	<!-- Topbar -->
		<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

		<!-- Sidebar Toggle (Topbar) -->
			<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
				<i class="fa fa-bars"></i>
			</button>

			<!-- Nav Item - Alerts -->
				
			<ul class="navbar-nav ml-auto">
			<?php if ($this->session->userdata('level') == "siswa"): ?>
	            <li class="nav-item dropdown no-arrow mx-1">
	              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                <i class="fas fa-bell fa-fw"></i>
	                <!-- Counter - Alerts -->
	                <?php if (count($notif) > 0): ?>
	                <span class="badge badge-danger badge-counter">
	                	<?= count($notif) ?>
	                </span>
	                	
	                <?php endif ?>
	              </a>
	              <!-- Dropdown - Alerts -->
	              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
	                <div class="dropdown-header bg-success border border-success">
	                  Notifikasi
	                </div>
	                <?php foreach ($notif as $n): ?>
	                	
		                <a class="dropdown-item d-flex align-items-center bg-transparan" href="#">
		                  <div class="mr-3">
		                    <div class="icon-circle bg-<?= $n->bg_color ?>">
		                      <i class="<?= $n->icon ?> text-white"></i>
		                    </div>
		                  </div>
		                  <div>
		                    <div class="small text-gray">
		                    	<?= formatHariTanggal($n->tanggal) ?>
		                    </div>
		                    <span class="font-weight-bold">
		                    	<?= $n->pesan ?>
		                    </span>
		                  </div>
		                </a>
	                <?php endforeach ?>
	                <a class="dropdown-item text-center small text-gray-500" href="<?= base_url('notifikasi') ?>">
	                	Lihat Semua Notifikasi
	                </a>
	              </div>
	            </li>

	            <div class="topbar-divider d-none d-sm-block"></div>
      		<?php endif ?>

	            <!-- Nav Item - User Information -->
	            <li class="nav-item dropdown no-arrow">
	              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                <span class="mr-3 d-none d-lg-inline text-gray-600 small">Halo, <?= $this->session->userdata('username'); ?></span>
	                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
	              </a>
	              <!-- Dropdown - User Information -->
	              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
	                <a class="dropdown-item" href="#">
	                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
	                  Profile
	                </a>
	                <a class="dropdown-item" href="#">
	                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
	                  Settings
	                </a>
	                <a class="dropdown-item" href="#">
	                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
	                  Activity Log
	                </a>
	                <div class="dropdown-divider"></div>
	                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
	                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
	                  Logout
	                </a>
	              </div>
	            </li>

          </ul>

		</nav>
	<!-- End of Topbar -->