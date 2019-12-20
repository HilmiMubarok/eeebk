<div class="container-fluid">
	<?php if ($this->session->flashdata()): ?>
		<div class="alert alert-<?= $this->session->flashdata('icon') ?> bg-<?= $this->session->flashdata('icon') ?> text-white">
			<?= $this->session->flashdata('pesan') ?>
		</div>
	<?php endif ?>
	<h3>Data Siswa</h3>
	<div class="card shadow">
		<div class="card-header">
			<button class="btn btn-success" data-toggle="modal" data-target="#modalAddDataSiswa">
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
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; foreach ($siswa as $s): ?>
						<tr>
							<td><?= $no ?></td>
							<td><?= $s->nis ?></td>
							<td><?= $s->nama_siswa ?></td>
							<td><?= $s->kelas ?></td>
							<td>
								<a href="<?= base_url('siswa/edit/'). $s->nis ?>" style="text-decoration: none;">
									<button class="btn btn-warning text-white">
										<i class="fas fa-edit"></i>
									</button>
								</a>
								<a href="<?= base_url('siswa/delete/'). $s->nis ?>">
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