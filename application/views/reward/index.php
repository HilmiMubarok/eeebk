<div class="container-fluid">
	<?php if ($this->session->flashdata()): ?>
		<div class="alert alert-<?= $this->session->flashdata('icon') ?> bg-<?= $this->session->flashdata('icon') ?> text-white">
			<?= $this->session->flashdata('pesan') ?>
		</div>
	<?php endif ?>
	<h3>Daftar Reward</h3>
	<div class="card shadow">
		<div class="card-header">
			<button class="btn btn-success" data-toggle="modal" data-target="#addReward">
				<i class="fas fa-plus"></i> Tambah Data
			</button>
		</div>
		<div class="card-body">
			<table class="table table-hover table-bordered table-stripped mt-4" id="dataTable">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Reward</th>
						<th>Skor</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; foreach ($reward as $r): ?>
						<tr>
							<td><?= $no ?></td>
							<td><?= $r->nama_reward ?></td>
							<td><?= $r->skor_reward ?></td>
							<td>
								<a href="<?= base_url('reward/edit/'). $r->id_reward ?>" style="text-decoration: none;">
									<button class="btn btn-warning text-white">
										<i class="fas fa-edit"></i>
									</button>
								</a>
								<a href="<?= base_url('reward/delete/'). $r->id_reward ?>">
									<button class="btn btn-danger text-white">
										<i class="fas fa-trash"></i>
									</button>
								</a>
							</td>
						</tr>
					<?php $no++; endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>