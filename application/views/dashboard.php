<div class="container-fluid">
	<div class="alert alert-primary bg-primary text-white p-5 shadow">
			<h3>Halo <?= ($level == "Siswa" ? $this->session->userdata('nama_siswa') : $this->session->userdata('username')) ?>, Anda Login Sebagai <?= $level ?></h3>
			<h4>
				Selamat Datang di Aplikasi
				<b>E BK Pada SMK Negeri 5 Kendal</b> <br>
			</h4>
	</div>


	<div class="row mt-5">

      <?php if ($level == "Siswa"): ?>
        
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-4 col-md-4 mb-2">
        <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
			         Jumlah Pelanggaran
                <div class="h4 mb-0 font-weight-bold text-gray-800">
                  <?= ($jumlah_pelanggaran == null ? "0" : $jumlah_pelanggaran) ?>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-ban fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-4 col-md-4 mb-2">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
              	Jumlah Skor
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?= ($jumlah_skor == null ? "0" : $jumlah_skor->jumlah_skor) ?>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-4 col-md-4 mb-2">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                Jumlah Point
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?= ($jumlah_point == null ? "0" : $jumlah_point->jumlah_point) ?>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php endif ?>
    </div>
</div>