<div class="modal fade" id="addKonseling" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" style="border: none;">
			<div class="modal-header bg-success text-white">
				<h5 class="modal-title">
					<?= $title_modal ?>
				</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url() ?>konseling/save" method="POST">
					<div class="form-group">
						<label>Nama Pelanggaran</label>
						<select class="form-control-lg" id="select2" name="nama_pelanggaran">
							<option value="">Pilih Jenis Pelanggaran</option>
							<?php foreach ($pelanggaran as $p): ?>
								<option value="<?= $p->id_pelanggaran ?>"><?= $p->nama_pelanggaran ?></option>
							<?php endforeach ?>
						</select>
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