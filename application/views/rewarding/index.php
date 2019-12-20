<div class="container-fluid">
	<?php if ($this->session->flashdata()): ?>
		<div class="alert alert-<?= $this->session->flashdata('icon') ?> bg-<?= $this->session->flashdata('icon') ?> text-white">
			<?= $this->session->flashdata('pesan') ?>
		</div>
	<?php endif ?>
	<h3>Rewarding Siswa</h3>
	<div class="card shadow mt-3">
		<div class="card-body">
			<table class="table table-bordered table-stripped" id="dataTable">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Siswa</th>
						<th>Kelas</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; foreach ($siswa as $s): ?>
						<tr>
							<td><?= $no ?></td>
							<td><?= $s->nama_siswa ?></td>
							<td><?= $s->kelas ?></td>
							<td>
								<a href="<?= base_url('rewarding/siswa/').$s->nis ?>">
									<button class="btn btn-success">
										Pilih
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