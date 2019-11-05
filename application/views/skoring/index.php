<div class="container-fluid">
	<?php if ($this->session->flashdata()): ?>
		<div class="alert alert-<?= $this->session->flashdata('icon') ?> bg-<?= $this->session->flashdata('icon') ?> text-white">
			<?= $this->session->flashdata('pesan') ?>
		</div>
	<?php endif ?>
	<h3>Skoring Pelanggaran Siswa</h3>
	<div class="card shadow mt-3">
		<div class="card-body">
			<table class="table table-bordered table-stripped" id="dataTable">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Siswa</th>
						<th>Jenis Pelanggaran</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; foreach ($skoring as $s): ?>
						<tr>
							<td><?= $no ?></td>
							<td><?= $s->siswa_id ?></td>
							<td><?= $s->nama_pelanggaran ?></td>
							<td>
								<a href="<?= base_url('skoring/acc/'.$s->siswa_id.'/'.$s->pelanggaran_id.'/'.$s->skor_pelanggaran) ?>">
									<button class="btn btn-success">
										Setujui
									</button>
								</a>
								<a href="<?= base_url('skoring/tolak/'.$s->siswa_id.'/'.$s->pelanggaran_id.'/'.$s->skor_pelanggaran) ?>">
									<button class="btn btn-danger">
										Tolak
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