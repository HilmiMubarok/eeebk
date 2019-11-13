<div class="container-fluid">
	<?php if ($this->session->flashdata()): ?>
		<div class="alert alert-<?= $this->session->flashdata('icon') ?> bg-<?= $this->session->flashdata('icon') ?> text-white">
			<?= $this->session->flashdata('pesan') ?>
		</div>
	<?php endif ?>
	<h3>Data Siswa</h3>
	<div class="card shadow">
		<div class="card-header">
			<button class="btn btn-success">
				<i class="fas fa-plus"></i> Tambah Siswa
			</button>
			<button class="btn btn-danger" data-toggle="modal" data-target="#modalAddSiswa">
				<i class="fas fa-upload"></i> Import Siswa
			</button>
		</div>
		<div class="card-body">
			<table class="table table-stripped table-bordered" id="dataTable">
				<thead>
					<tr>
						<th>No.</th>
						<th>NIS</th>
						<th>Nama Siswa</th>
						<th>Kelas</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; foreach ($siswa as $s): ?>
						<tr>
							<td><?= $no ?></td>
							<td><?= $s->nis ?></td>
							<td><?= $s->nama_siswa ?></td>
							<td><?= $s->kelas ?></td>
						</tr>
					<?php $no++; endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>