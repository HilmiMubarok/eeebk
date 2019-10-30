<div class="container-fluid">
	<?php if ($this->session->flashdata()): ?>
		<div class="alert alert-<?= $this->session->flashdata('icon') ?> bg-<?= $this->session->flashdata('icon') ?> text-white">
			<?= $this->session->flashdata('pesan') ?>
		</div>
	<?php endif ?>
	<h3>Konseling</h3>
	<div class="card mt-3 shadow">
		<div class="card-header">
			<button class="btn btn-success" data-toggle="modal" data-target="#addKonseling">
				<i class="fas fa-plus"></i> Tambah Data
			</button>
		</div>
		<div class="card-body">
			<table id="dataTable" class="table table-hover table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Pelanggaran</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; foreach ($konseling as $k): ?>
						<tr>
							<td><?= $no ?></td>
							<td><?= $k->nama_pelanggaran ?></td>
							<td>
								<?php
									if ($k->status == "pending") {
										echo "<span class='text-warning'>
											<b>$k->status</b>
										</span>";
									} elseif ($k->status == "disetujui") {
										echo "<span class='text-success'>
											<b>$k->status</b>
										</span>";
									} else {
										echo "<span class='text-danger'>
											<b>$k->status</b>
										</span>";
									}
								?>
							</td>
						</tr>
					<?php $no++; endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>