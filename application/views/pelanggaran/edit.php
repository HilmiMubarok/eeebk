<div class="container-fluid">
	<h3><?= $title ?></h3>
	<div class="card shadow mt-3">
		<div class="card-body">
			<form action="<?= base_url('pelanggaran/update') ?>" method="POST">
				<input type="hidden" name="id_pelanggaran" value="<?= $pelanggaran->id_pelanggaran ?>">
				<div class="form-group">
					<label>Nama Pelanggaran</label>
					<input type="text" name="nama_pelanggaran" class="form-control" value="<?= $pelanggaran->nama_pelanggaran ?>">
				</div>
				<div class="form-group">
					<label>Skor Pelanggaran</label>
					<input type="number" name="skor_pelanggaran" class="form-control" value="<?= $pelanggaran->skor_pelanggaran ?>">
				</div>
		</div>
		<div class="card-footer">
				<button type="submit" class="btn btn-success">
					Update Data
				</button>
			</form>
			<a href="<?= base_url('pelanggaran') ?>">
				<button class="btn btn-danger">Batal</button>
			</a>
		</div>
	</div>	
</div>