<div class="container-fluid">
	<h3><?= $title ?></h3>
	<div class="card shadow mt-3">
		<div class="card-body">
			<form action="<?= base_url('reward/update') ?>" method="POST">
				<input type="hidden" name="id_reward" value="<?= $reward->id_reward ?>">
				<div class="form-group">
					<label>Nama Reward</label>
					<input type="text" name="nama_reward" class="form-control" value="<?= $reward->nama_reward ?>">
				</div>
				<div class="form-group">
					<label>Skor</label>
					<input type="number" name="skor_reward" class="form-control" value="<?= $reward->skor_reward ?>">
				</div>
		</div>
		<div class="card-footer">
				<button type="submit" class="btn btn-success">
					Update Data
				</button>
			</form>
			<a href="<?= base_url('reward') ?>">
				<button class="btn btn-danger">Batal</button>
			</a>
		</div>
	</div>	
</div>