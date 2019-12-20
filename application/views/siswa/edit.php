<div class="container-fluid">
	<h3><?= $title ?></h3>
	<div class="card shadow mt-3">
		<div class="card-body">
			<form action="<?= base_url('siswa/update') ?>" method="POST">
				<input type="hidden" name="nis" value="<?= $siswa->nis ?>">
				<div class="form-group">
					<label>Nama Siswa</label>
					<input type="text" name="nama_siswa" class="form-control" value="<?= $siswa->nama_siswa ?>">
				</div>
				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select name="jenkel" class="form-control">
						<option value="L" <?= ($siswa->jenkel == "L") ? "selected" : null ?>>Laki-Laki</option>
						<option value="P" <?= ($siswa->jenkel == "P") ? "selected" : null ?>>Perempuan</option>
					</select>
				</div>
				<div class="form-group">
					<label>Tempat Lahir</label>
					<input type="text" name="tempat_lahir" class="form-control" value="<?= $siswa->tempat_lahir ?>">
				</div>
				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input type="date" name="tanggal_lahir" class="form-control" value="<?= $siswa->tanggal_lahir ?>">
				</div>
				<div class="form-group">
					<label>Agama</label>
					<input type="text" name="agama" class="form-control" value="<?= $siswa->agama ?>">
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<textarea name="alamat" class="form-control" rows="5"><?= $siswa->alamat ?></textarea>
				</div>
				<div class="form-group">
					<label>Nama Ayah</label>
					<input type="text" name="nama_ayah" class="form-control" value="<?= $siswa->nama_ayah ?>">
				</div>
				<div class="form-group">
					<label>Nama Ibu</label>
					<input type="text" name="nama_ibu" class="form-control" value="<?= $siswa->nama_ibu ?>">
				</div>
				<div class="form-group">
					<label>Asal Sekolah</label>
					<input type="text" name="asal_sekolah" class="form-control" value="<?= $siswa->asal_sekolah ?>">
				</div>
				<div class="form-group">
					<label>Usia</label>
					<input type="text" name="usia" class="form-control" value="<?= $siswa->usia ?>">
				</div>
				<div class="form-group">
					<label>Kelas</label>
					<input type="text" name="kelas" class="form-control" value="<?= $siswa->kelas ?>">
				</div>
				<div class="form-group">
					<label>Keterangan</label>
					<textarea type="text" name="keterangan" class="form-control" ><?= $siswa->keterangan ?></textarea>
				</div>
		</div>
		<div class="card-footer">
				<button type="submit" class="btn btn-success">
					Update Data
				</button>
			</form>
			<a href="<?= base_url('siswa') ?>">
				<button class="btn btn-danger">Batal</button>
			</a>
		</div>
	</div>	
</div>