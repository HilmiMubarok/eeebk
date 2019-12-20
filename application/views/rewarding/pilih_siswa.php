<div class="container-fluid">
	<?php if ($this->session->flashdata()): ?>
		<div class="alert alert-<?= $this->session->flashdata('icon') ?> bg-<?= $this->session->flashdata('icon') ?> text-white">
			<?= $this->session->flashdata('pesan') ?>
		</div>
	<?php endif ?>
	<h3>Pilih Skor Untuk <?= $siswa->nama_siswa ?></h3>
	<div class="card shadow">
		
		<div class="card-body">
			<form action="<?= base_url('rewarding/acc/').$siswa->nis ?>" method="POST">
				<select name="reward" class="form-control-lg" id="select2" style="width: 100%">
					<option><b>Pilih Reward</b></option>
					<?php foreach ($reward as $r): ?>
						<option value="<?= $r->id_reward ?>" name="reward">
							<?= $r->nama_reward. " (" .$r->skor_reward. ")" ?>
						</option>
					<?php endforeach ?>
				</select>

				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-sm btn-primary">
						Submit
					</button>
				</div>
			</form>
	</div>
</div>