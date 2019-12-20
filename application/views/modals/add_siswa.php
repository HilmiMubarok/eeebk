<div class="modal fade" id="modalAddDataSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" style="border: none;">
			<div class="modal-header bg-success text-white">
				<h5 class="modal-title">
					<?= $title_modal2 ?>
				</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url() ?>siswa/save" method="POST">
					<div class="form-group">
						<label>Nomor Induk Siswa</label>
						<input type="number" name="nis" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Nama Siswa</label>
						<input type="text" name="nama_siswa" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Jenis Kelamin</label>
						<select name="jenkel" class="form-control">
							<option value="L">Laki-Laki</option>
							<option value="P">Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label>Tempat Lahir</label>
						<input type="text" name="tempat_lahir" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Tanggal Lahir</label>
						<input type="date" name="tanggal_lahir" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Agama</label>
						<input type="text" name="agama" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Kelas</label>
						<input type="text" name="kelas" class="form-control" required>
					</div>
					<div class="form-group">
						<label>alamat</label>
						<textarea name="alamat" class="form-control" rows="5"></textarea>
					</div>
					
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">
					<i class="fas fa-ban"></i> Batal
				</button>
				<button type="submit" class="btn btn-success">
					<i class="fas fa-save"></i> Simpan
				</button>
				</form>
			</div>
		</div>
	</div>
</div>